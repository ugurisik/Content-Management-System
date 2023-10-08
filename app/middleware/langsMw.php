<?php

namespace App\middleware;

class langsMw extends \Controller
{
    public $langData;
    public function langDatas($file)
    {
        $this->langData = $this->utils->readLangTranslates($this->session->getSession('lang'), $file);
        return $this->langData;
    }
    public function insert($postData)
    {
        if ($this->checkPostData($postData) != 'true') {
            return $this->checkPostData($postData);
        } else {
            if (isset($postData['defaultLang'])) {
                $defaultLang = 1;
            } else {
                $defaultLang = 0;
            }
            $datas = [
                'Guid' => $this->utils->generateGuid(),
                'Title' => $postData['langTitle'],
                'SubTitle' => $postData['langSubTitle'],
                'Img' => $postData['cover'][0],
                'Url' => $this->utils->lowerCase($postData['langSubTitle']),
                'Status' => $postData['status'],
                'DefaultLang' => $defaultLang,
                'CreatedDate' => date('Y-m-d H:i:s'),
                'UpdatedDate' => date('Y-m-d H:i:s'),
            ];
            $insert = $this->model('sampleModel')->addData('langs', $datas);
            if ($insert) {
                if ($defaultLang == 1) {
                    $update = $this->model('sampleModel')->updateData('langs', ['DefaultLang' => 0], ['Guid' => $datas['Guid']], ['Guid' => '!=']);
                }
                $this->files->recurseCopy('lang/en', 'lang/' . $datas['Url']);
                $message = [
                    'Status' => true,
                    'Message' => 'Dil başarıyla eklendi!'
                ];
            } else {
                $message = [
                    'Status' => false,
                    'Message' => 'Dil eklenirken bir hata oluştu!'
                ];
            }
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
    }
    public function update($postData, $langGuid)
    {
        if ($this->checkPostData($postData) != 'true') {
            return $this->checkPostData($postData);
        } else {
            if (isset($postData['defaultLang'])) {
                $defaultLang = 1;
            } else {
                $defaultLang = 0;
            }
            if (substr($postData['cover'][0], 0, 1) != '/' && substr($postData['cover'][0], 0, 1) != '') {
                $postData['cover'][0] = '/' . $postData['cover'][0];
            }
            $datas = [
                'Title' => $postData['langTitle'],
                'SubTitle' => $postData['langSubTitle'],
                'Img' => $postData['cover'][0],
                'Url' => $this->utils->lowerCase($postData['langSubTitle']),
                'Status' => $postData['status'],
                'DefaultLang' => $defaultLang,
                'UpdatedDate' => date('Y-m-d H:i:s'),
            ];
            $insert = $this->model('sampleModel')->updateData('langs', $datas, ['Guid' => $langGuid]);
            if ($insert) {
                if ($defaultLang == 1) {
                    $update = $this->model('sampleModel')->updateData('langs', ['DefaultLang' => 0], ['Guid' => $langGuid], ['Guid' => '!=']);
                }
                $message = [
                    'Status' => true,
                    'Message' => 'Dil başarıyla güncellendi!'
                ];
            } else {
                $message = [
                    'Status' => false,
                    'Message' => 'Dil güncellenirken bir hata oluştu!'
                ];
            }
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
    }
    public function delete($postData)
    {
        $guid = $postData['guid'];
        $lang = $this->getLang($guid);
        if ($lang['DefaultLang'] == 1) {
            $message = [
                'Status' => false,
                'Message' => 'Varsayılan dil silinemez!'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        if ($lang['Is_Deletable'] == 0) {
            $message = [
                'Status' => false,
                'Message' => 'Bu dil silinemez!'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        $delete = $this->model('sampleModel')->deleteData('langs', ['Guid' => $guid]);
        if ($delete) {
            $this->files->deleteFile('lang/' . $postData['url']);
            $message = [
                'Status' => true,
                'Message' => 'Dil başarıyla silindi!'
            ];
        } else {
            $message = [
                'Status' => false,
                'Message' => 'Dil silinirken bir hata oluştu!'
            ];
        }
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function translate($postData, $langGuid, $fileName = null)
    {
        $lang = $this->getLang($langGuid);
        if (isset($fileName) && !empty($fileName)) {
            $datas = $this->utils->readLangTranslates($lang['Url'], $fileName);
            if (!empty($datas)) {
                $message = [
                    'Status' => true,
                    'Message' => 'Dil başarıyla getirildi!',
                    'Datas' => $datas
                ];
            } else {
                $message = [
                    'Status' => false,
                    'Message' => 'Dil getirilirken bir hata oluştu!'
                ];
            }
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        } else if (!empty($lang)) {
            $fileName = $postData['fileName'];
            unset($postData['_token']);
            unset($postData['fileName']);
            $postData = json_encode($postData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
            if (file_put_contents('lang/' . $lang['Url'] . '/' . $fileName . '.json', $postData)) {
                $message = [
                    'Status' => true,
                    'Message' => 'Dil başarıyla güncellendi!'
                ];
            } else {
                $message = [
                    'Status' => false,
                    'Message' => 'Dil güncellenirken bir hata oluştu!'
                ];
            }
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        } else {
            $message = [
                'Status' => false,
                'Message' => 'Dil bulunamadı!'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
    }

    public function getLang($guid)
    {
        $lang = $this->model('sampleModel')->getOneData('langs', ['Guid' => $guid]);
        return $lang;
    }

    public function checkPostData($postData)
    {
        $emptyDatas = [];
        foreach ($postData as $key => $value) {
            if (empty($value) && $value != '0') {
                $emptyDatas[$key] = $value;
            }
        }
        if (!empty($emptyDatas)) {
            $message = [
                'Status' => false,
                'Message' => 'Lütfen boş alan bırakmayınız!',
                'EmptyDatas' => $emptyDatas
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        } else {
            return 'true';
        }
    }
}
