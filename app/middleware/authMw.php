<?php

namespace App\middleware;

class authMw extends \Controller
{
    public $username, $password, $remember, $isAdmin;
    public function Login($username, $password, $remember, $isAdmin = false)
    {
        if ($this->checkIpLoginBan()) {
            $message = [
                'Status' => false,
                'Message' => 'Hatalı giriş denemesi sebebiyle hesabınız 15 dakika boyunca askıya alınmıştır!'
            ];
            return json_encode($message, JSON_UNESCAPED_UNICODE);
        }
        $this->username = $username;
        $this->password = $password;
        $this->remember = $remember;
        $this->isAdmin = $isAdmin;
        $data = $this->model('sampleModel')->getDataOrWhere('user', ['UserName' => $this->username, 'Email' => $this->username])[0];
        if (!empty($data)) {
            if ($this->security->verifyHash($data['Password'], $this->password)) {
                if ($data['Status']) {
                    $token = $this->utils->generateGuid();
                    $datas = [
                        'LoginToken' => $token,
                        'LoginTry' => 1,
                    ];
                    if ($this->isAdmin && $data['Role'] != 2) {
                        $update = $this->model('sampleModel')->updateData('user', $datas, ['Guid' => $data['Guid']]);
                        $this->session->createSession([
                            LOGIN_ADMIN => true,
                            LOGIN_TOKEN_ADMIN => $token,
                            LOGIN_TOKEN_TIME_ADMIN => time(),
                        ]);
                    } elseif (!$this->isAdmin) {
                        $update = $this->model('sampleModel')->updateData('user', $datas, ['Guid' => $data['Guid']]);
                        $this->session->createSession([
                            LOGIN_USER => true,
                            LOGIN_TOKEN_USER => $token,
                            LOGIN_TOKEN_TIME_USER => time(),
                        ]);
                    } else {
                        $message = [
                            'Status' => false,
                            'Message' => 'Bu sayfaya erişim yetkiniz bulunmamaktadır!'
                        ];
                        return json_encode($message, JSON_UNESCAPED_UNICODE);
                    }
                    $datas = [
                        'Guid' => $this->utils->generateGuid(),
                        'UserGuid' => $data['Guid'],
                        'Browser' => $this->security->getBrowser(),
                        'IP' => $this->security->getIP(),
                        'OS' => $this->security->getOS(),
                        'UserAgent' => $this->security->getUserAgent(),
                        'BrowserLang' => $this->security->getLang(),
                        'Location' => $this->security->visitorLocation()
                    ];
                    $insert = $this->model('sampleModel')->addData('user_login_info', $datas);
                    $message = [
                        'Status' => true,
                        'Message' => 'Giriş Başarılı!'
                    ];
                } elseif ($data['Status'] == 2) {
                    $message = [
                        'Status' => false,
                        'Message' => 'Hesabınız askıya alınmıştır!'
                    ];
                } else {
                    $message = [
                        'Status' => false,
                        'Message' => 'Hesabınız yasaklanmıştır!'
                    ];
                }
            } else {
                if ($data['LoginTry'] < 3) {
                    $up = $data['LoginTry'] + 1;
                    $datas = [
                        'LoginTry' => $up,
                    ];
                    $update = $this->model('sampleModel')->updateData('user', $datas, ['Guid' => $data['Guid']]);
                    $datas = [
                        'Guid' => $this->utils->generateGuid(),
                        'UserGuid' => $data['Guid'],
                        'Browser' => $this->security->getBrowser(),
                        'IP' => $this->security->getIP(),
                        'OS' => $this->security->getOS(),
                        'UserAgent' => $this->security->getUserAgent(),
                        'BrowserLang' => $this->security->getLang(),
                        'Location' => $this->security->visitorLocation(),
                        'UserName_Mail' => $this->username,
                        'Password' => $this->password
                    ];
                    $insert = $this->model('sampleModel')->addData('user_login_error', $datas);
                    $message = [
                        'Status' => false,
                        'Message' => 'Kullanıcı adı veya şifre hatalı!'
                    ];
                } elseif ($data['LoginTry'] == 3) {

                    if (!$this->checkIpLoginBan()) {
                        $datas = [
                            'StartDate' => date('Y-m-d H:i:s'),
                            'EndDate' => date('Y-m-d H:i:s', strtotime('+15 minutes')),
                            'UserIP' => $this->security->getIP(),
                            'Guid' => $this->utils->generateGuid(),
                        ];
                        $insert = $this->model('sampleModel')->addData('user_login_ban', $datas);
                    }
                    $message = [
                        'Status' => false,
                        'Message' => 'Hatalı giriş denemesi sebebiyle hesabınız 15 dakika boyunca askıya alınmıştır!'
                    ];
                } else {
                    $datas = [
                        'Guid' => $this->utils->generateGuid(),
                        'UserGuid' => $data['Guid'],
                        'Browser' => $this->security->getBrowser(),
                        'IP' => $this->security->getIP(),
                        'OS' => $this->security->getOS(),
                        'UserAgent' => $this->security->getUserAgent(),
                        'BrowserLang' => $this->security->getLang(),
                        'Location' => $this->security->visitorLocation(),
                        'UserName_Mail' => $this->username,
                        'Password' => $this->password
                    ];
                    $insert = $this->model('sampleModel')->addData('user_login_error', $datas);
                    $message = [
                        'Status' => false,
                        'Message' => 'Kullanıcı adı veya şifre hatalı!'
                    ];
                }
            }
        } else {
            $message = [
                'Status' => false,
                'Message' => 'Kullanıcı bulunamadı!'
            ];
        }
        $this->log->createLog($this->username, $message['Message']);
        return json_encode($message, JSON_UNESCAPED_UNICODE);
    }
    public function checkIpLoginBan()
    {
        $data = $this->model('sampleModel')->getOneData('user_login_ban', ['UserIP' => $this->security->getIP()]);
        if ($data['EndDate'] > date('Y-m-d H:i:s')) {
            return true;
        } else {
            return false;
        }
    }

    public function isLogged($isAdmin = false, $isRedirectMain = true)
    {
        if ($isAdmin) {
            $LoginToken = $this->session->getSession(LOGIN_TOKEN_ADMIN);
            $LoginTokenTime = $this->session->getSession(LOGIN_TOKEN_TIME_ADMIN);
            $Login = $this->session->getSession(LOGIN_ADMIN);
            $LoginTokenTimeLimit = LOGIN_TOKEN_TIME_ADMIN_LIMIT;
        } else {
            $LoginToken = $this->session->getSession(LOGIN_TOKEN_USER);
            $LoginTokenTime = $this->session->getSession(LOGIN_TOKEN_TIME_USER);
            $Login = $this->session->getSession(LOGIN_USER);
            $LoginTokenTimeLimit = LOGIN_TOKEN_TIME_USER_LIMIT;
        }
        $data = $this->model('sampleModel')->getOneData('user', ['LoginToken' => $LoginToken]);
        if (empty($data)) {
            //$this->session->allSessionDelete();
            if (!$isRedirectMain) {
                $this->utils->redirect('admincp/login');
            }
        } else {
            if ($LoginToken == $data['LoginToken']) {
                if (time() - $LoginTokenTime > $LoginTokenTimeLimit) {
                    $this->session->allSessionDelete();
                    $this->utils->redirect('admincp/login');
                } else {
                    if ($Login) {
                        if ($isRedirectMain) {
                            $this->utils->redirect('admincp/main');
                        }
                    } else {
                        $this->session->allSessionDelete();
                        if (!$isRedirectMain) {
                            $this->utils->redirect('admincp/login');
                        }
                    }
                }
            } else {
                $this->session->allSessionDelete();
                if (!$isRedirectMain) {
                    $this->utils->redirect('admincp/login');
                }
            }
        }
    }

    public function tokenCheck($_token)
    {
        if ($this->session->getSession('_token') != $_token) {
            $this->logout();
        }
    }

    public function logout()
    {
        $this->session->allSessionDelete();
        $this->utils->redirect('admincp/login');
    }
}
