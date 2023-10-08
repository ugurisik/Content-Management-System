<?php

namespace App\middleware;

class frontMw extends \Controller
{
    public $langData;
    public function langDatas($file)
    {
        $this->langData = $this->utils->readLangTranslates($this->session->getSession('lang'), $file);
        return $this->langData;
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
    public function changeLang($guid, $url = null)
    {
        $lang = $this->getLang($guid);
        if (!empty($lang)) {
            $this->session->createSession(['lang' => $lang['Url']]);
            $this->utils->Redirect($url);
        } else {
            $this->session->createSession(['lang' => DEFAULT_LANG_ISNULL]);
            $this->utils->Redirect($url);
        }
    }
}
