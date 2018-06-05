<?php
/**
 * Created by PhpStorm.
 * User: Imad
 * Date: 04/09/2016
 * Time: 21:36
 */
ini_set("display_errors",0);error_reporting(0);

if(!$_SESSION["user"]) {
    $i = "";

    $p = "";
    $form = ' <div id="login-overlay" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Se Connecter</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="well">
                                <form id="loginForm" method="POST" action="" novalidate="novalidate">
                                    <div class="form-group">';
    if (isset($_POST['username']) && !preg_match("/^[[:alnum:]]{4,20}$/", $_POST['username'])) {
        $i = "* champs vide ou incorrect";
        $err = 1;
    } else $err = 0;
    if (isset($_POST['username'])) $p = $_POST['username'];
    $form .= '

                                        <label for="username" class="control-label">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="' . $p . '" required="" title="Please enter you username" placeholder="example@gmail.com">
                                        <span class="label label-danger ">' . $i . '</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="control-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please enter your password">
                                        <span class="help-block"></span>
                                    </div>
                                    <div id="loginErrorMsg" class="alert alert-error hide">Wrong username og password</div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" id="remember"> Remember login
                                        </label>
                                        <p class="help-block">(if this is a private computer)</p>
                                    </div>
                                    <button type="submit" name="connecter"  class="btn btn-success btn-block">Login</button>
                                    <a href="/forgot/" class="btn btn-default btn-block">Help to login</a>
                                </form>';
    if (isset($_POST['connecter']) && $err == 0) {
        $r = $c->query("select * from login where username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "'");
        if (!$r->rowCount()) {
            $param['msg'] = "login ou mot de passe inexistant";
        } else {
            $row = $r->fetch(PDO::FETCH_ASSOC);
            $param['info'] = "Bienvenu " . $_POST['username'];
            $tpl = "accueil.twig";
            $_SESSION["user"] = $row;
            header('Location:accueil.html');

        }
    }

    $form .= '                    </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>';
}
else $form = '';

$param["form"]=$form;

$tpl = "connexion.twig";
