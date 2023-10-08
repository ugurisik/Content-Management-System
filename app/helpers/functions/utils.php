<?php

namespace App\helpers\functions;

use App\middleware\authMw;

class utils
{
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function generateGuid()
    {
        return sprintf(
            '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 4095),
            bindec(substr_replace(sprintf('%016b', mt_rand(0, 65535)), '01', 6, 2)),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
        );
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters) - 1;
        $randomString = '';
        for ($i = 0; $i < $length; ++$i) {
            $randomString .= $characters[rand(0, $charactersLength)];
        }
        return $randomString;
    }

    public function generateRandomNumber($length = 10)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters) - 1;
        $randomNumber = '';
        for ($i = 0; $i < $length; ++$i) {
            $randomNumber .= $characters[rand(0, $charactersLength)];
        }
        echo $randomNumber;
        return $randomNumber;
    }

    public function ShortenText($text, $chars = 25)
    {
        $text = $text . ' ';
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text, ' '));
        return $text;
    }

    public function ShortenWords($text, $words = 25)
    {
        $text = explode(' ', $text);
        $text = array_slice($text, 0, $words);
        $text = implode(' ', $text);
        return $text;
    }

    public function TrToEn($text)
    {
        $text = trim($text);
        $search = array('À', 'È', 'Ð', 'Ø', 'ß', 'à', 'è', 'ð', 'ø', 'ÿ', '©', 'Α', 'Ι', 'Ρ', 'Ά', 'Ϋ', 'α', 'ι', 'ρ', 'ά', 'ϊ', 'Ş', 'ş', 'А', 'З', 'П', 'Ч', 'Я', 'а', 'з', 'п', 'ч', 'я', 'Є', 'є', 'Č', 'Ž', 'č', 'ž', 'Ą', 'Ż', 'ą', 'ż', 'Ā', 'Š', 'ā', 'š', 'Á', 'É', 'Ñ', 'Ù', 'á', 'é', 'ñ', 'ù', 'Β', 'Κ', 'Σ', 'Έ', 'β', 'κ', 'σ', 'έ', 'ΰ', 'İ', 'ı', 'Б', 'И', 'Р', 'Ш', 'б', 'и', 'р', 'ш', 'І', 'і', 'Ď', 'ď', 'Ć', 'ć', 'Č', 'Ū', 'č', 'ū', 'Â', 'Ê', 'Ò', 'Ú', 'â', 'ê', 'ò', 'ú', 'Γ', 'Λ', 'Τ', 'Ί', 'γ', 'λ', 'τ', 'ί', 'ϋ', 'Ç', 'ç', 'В', 'Й', 'С', 'Щ', 'в', 'й', 'с', 'щ', 'Ї', 'ї', 'Ě', 'ě', 'Ę', 'ę', 'Ē', 'Ž', 'ē', 'ž', 'Ã', 'Ë', 'Ó', 'Û', 'ã', 'ë', 'ó', 'û', 'Δ', 'Μ', 'Υ', 'Ό', 'δ', 'μ', 'υ', 'ό', 'ΐ', 'Ü', 'ü', 'Г', 'К', 'Т', 'Ъ', 'г', 'к', 'т', 'ъ', 'Ґ', 'ґ', 'Ň', 'ň', 'Ł', 'ł', 'Ģ', 'ģ', 'Ä', 'Ì', 'Ô', 'Ü', 'ä', 'ì', 'ô', 'ü', 'Ε', 'Ν', 'Φ', 'Ύ', 'ε', 'ν', 'φ', 'ύ', 'Ö', 'ö', 'Д', 'Л', 'У', 'Ы', 'д', 'л', 'у', 'ы', 'Ř', 'ř', 'Ń', 'ń', 'Ī', 'ī', 'Å', 'Í', 'Õ', 'Ű', 'å', 'í', 'õ', 'ű', 'Ζ', 'Ξ', 'Χ', 'Ή', 'ζ', 'ξ', 'χ', 'ή', 'Ğ', 'ğ', 'Е', 'М', 'Ф', 'Ь', 'е', 'м', 'ф', 'ь', 'Š', 'š', 'Ó', 'ó', 'Ķ', 'ķ', 'Æ', 'Î', 'Ö', 'Ý', 'æ', 'î', 'ö', 'ý', 'Η', 'Ο', 'Ψ', 'Ώ', 'η', 'ο', 'ψ', 'ώ', 'Ё', 'Н', 'Х', 'Э', 'ё', 'н', 'х', 'э', 'Ť', 'ť', 'Ś', 'ś', 'Ļ', 'ļ', 'Ç', 'Ï', 'Ő', 'Þ', 'ç', 'ï', 'ő', 'þ', 'Θ', 'Π', 'Ω', 'Ϊ', 'θ', 'π', 'ω', 'ς', 'Ж', 'О', 'Ц', 'Ю', 'ж', 'о', 'ц', 'ю', 'Ů', 'ů', 'Ź', 'ź', 'Ņ', 'ņ', ' ', ' ', '', '/', ' ', ' ', '', '&', ',', '?');
        $replace = array('A', 'E', 'D', 'O', 'ss', 'a', 'e', 'd', 'o', 'y', '(c)', 'A', 'I', 'R', 'A', 'Y', 'a', 'i', 'r', 'a', 'i', 'S', 's', 'A', 'Z', 'P', 'Ch', 'Ya', 'a', 'z', 'p', 'ch', 'ya', 'Ye', 'ye', 'C', 'Z', 'c', 'z', 'A', 'Z', 'a', 'z', 'A', 'S', 'a', 's', 'A', 'E', 'N', 'U', 'a', 'e', 'n', 'u', 'B', 'K', 'S', 'E', 'b', 'k', 's', 'e', 'y', 'I', 'i', 'B', 'I', 'R', 'Sh', 'b', 'i', 'r', 'sh', 'I', 'i', 'D', 'd', 'C', 'c', 'C', 'u', 'c', 'u', 'A', 'E', 'O', 'U', 'a', 'e', 'o', 'u', 'G', 'L', 'T', 'I', 'g', 'l', 't', 'i', 'y', 'C', 'c', 'V', 'J', 'S', 'Sh', 'v', 'j', 's', 'sh', 'Yi', 'yi', 'E', 'e', 'e', 'e', 'E', 'Z', 'e', 'z', 'A', 'E', 'O', 'U', 'a', 'e', 'o', 'u', 'D', 'M', 'Y', 'O', 'd', 'm', 'y', 'o', 'i', 'U', 'u', 'G', 'K', 'T', '', 'g', 'k', 't', '', 'G', 'g', 'N', 'n', 'L', 'l', 'G', 'g', 'A', 'I', 'O', 'U', 'a', 'i', 'o', 'u', 'E', 'N', 'F', 'Y', 'e', 'n', 'f', 'y', 'O', 'o', 'D', 'L', 'U', 'Y', 'd', 'l', 'u', 'y', 'R', 'r', 'N', 'n', 'i', 'i', 'A', 'I', 'O', 'U', 'a', 'i', 'o', 'u', 'Z', '3', 'X', 'H', 'z', '3', 'x', 'h', 'G', 'g', 'E', 'M', 'F', '', 'e', 'm', 'f', '', 'S', 's', 'o', 'o', 'k', 'k', 'AE', 'I', 'O', 'Y', 'ae', 'i', 'o', 'y', 'H', 'O', 'PS', 'W', 'h', 'o', 'ps', 'w', 'Yo', 'N', 'H', 'E', 'yo', 'n', 'h', 'e', 'T', 't', 'S', 's', 'L', 'l', 'C', 'I', 'O', 'TH', 'c', 'i', 'o', 'th', '8', 'P', 'W', 'I', '8', 'p', 'w', 's', 'Zh', 'O', 'C', 'Yu', 'zh', 'o', 'c', 'yu', 'U', 'u', 'Z', 'z', 'N', 'n', '-', '', '', '-', '-', '', '', '', '', '');
        $new_text = str_replace($search, $replace, $text);
        return $new_text;
    }

    public function SeoUrl($text)
    {
        $text = $this->TrToEn($text);
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9]/', '-', $text);
        $text = preg_replace('/-+/', "-", $text);
        $text = trim($text, '-');
        return $text;
    }

    public function lowerCase($text)
    {
        $text = $this->TrToEn($text);
        $text = strtolower($text);
        return $text;
    }

    public function upperCase($text)
    {
        $text = $this->TrToEn($text);
        $text = strtoupper($text);
        return $text;
    }

    public function Redirect($uri)
    {
        header('Location: ' . SITE_URL . '/' . $uri);
        exit;
    }

    public function LangList()
    {
        return $this->model->getData('langs', ['Status' => 1]);
    }

    public function readLangTranslates($langShortCode, $langFile)
    {
        $filePath = SITE_URL . '/lang/' . $langShortCode . '/' . $langFile . '.json';
        $file = file_get_contents($filePath);
        $file = json_decode($file, true);
        return $file;
    }

    public function checkLangTranslateDir($dirName)
    {
        $dirPath = 'lang/' . $dirName . '/';
        if (is_dir($dirPath)) {
            return true;
        } else {
            return false;
        }
    }

    public function readLangFiles($langShortCode)
    {
        $langFileName = 'lang/' . $langShortCode . '/';
        $files = array_diff(scandir($langFileName), array('.', '..'));
        $langFiles = [];
        foreach ($files as $file) {
            $file = explode('.', $file);
            $langFiles[] = $file[0];
        }
        return $langFiles;
    }

    public function getMenu()
    {
        $menuArr = [
            [
                "text" => "Siteyi Görüntüle",
                "href" => "" . SITE_URL . "",
                "icon" => "bi bi-house-fill",
                "target" => "_blank",
                "isHead" => false,
            ],
            [
                "text" => "Dashboard",
                "href" => "" . ADMIN_URL . "",
                "icon" => "bi bi-speedometer2",
                "target" => "",
                "active" => "main",
                "isHead" => false,
            ],
            [
                "text" => "Ayarlar",
                "icon" => "bi bi-gear",
                "isHead" => true,
                "children" => [
                    [
                        "text" => "Dil Ayarları",
                        "href" => "" . ADMIN_URL . "langs/list",
                        "icon" => "bi bi-translate",
                        "target" => "",
                        "active" => "langs"
                    ],
                    [
                        "text" => "Site Ayarları",
                        "href" => "" . ADMIN_URL . "langs/list",
                        "icon" => "bi bi-sliders",
                        "target" => "",
                        "active" => "settings"
                    ],
                    [
                        "text" => "Yönetici Ayarları",
                        "href" => "" . ADMIN_URL . "langs/list",
                        "icon" => "bi bi-people-fill",
                        "target" => "",
                        "active" => "users"
                    ]
                ]
            ]
        ];
        return $menuArr;
    }
}
