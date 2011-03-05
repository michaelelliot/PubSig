<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>

        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-language" content="en" />
        
        
        <title>PubSig Management Console</title>

        <!-- ExtJS -->
        <link rel="stylesheet" type="text/css" href="js/extjs/resources/css/ext-all-notheme.css" />
        <link rel="stylesheet" type="text/css" href="css/extjstheme.css" />
        
        <script type="text/javascript" src="js/extjs/adapter/ext/ext-base.js"></script>
        <script type="text/javascript" src="js/extjs/ext-all.js"></script>
        <script type="text/javascript" src="js/print_r.js"></script>


        <!-- Other ExtJS -->
        <!--
        <link rel="stylesheet" type="text/css" href="grid-examples.css" />
        <link rel="stylesheet" type="text/css" href="js/extjs/shared/examples.css" />
        -->

        <style type="text/css">
            /**/
            body .x-panel {
                margin-bottom:20px;
            }
            .icon-grid {
                background-image:url(js/extjs/shared/icons/fam/grid.png) !important;
            }
            .icon-clear-group {
                background-image:url(js/extjs/shared/icons/fam/control_rewind.png) !important;
            }
            #button-grid .x-panel-body {
                border:1px solid #99bbe8;
                border-top:0 none;
            }
            .add {
                background-image:url(js/extjs/shared/icons/fam/add.gif) !important;
            }
            .option {
                background-image:url(js/extjs/shared/icons/fam/plugin.gif) !important;
            }
            .remove {
                background-image:url(js/extjs/shared/icons/fam/delete.gif) !important;
            }
            .save {
                background-image:url(js/extjs/shared/icons/save.gif) !important;
            }
        </style>

        <!-- jQuery -->
        <script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.10.custom.min.js"></script>
        <link type="text/css" rel="stylesheet" href="css/themes/base/jquery.ui.all.css" />

        <!-- Startup -->
        <script type="text/javascript">

            $(document).ready(function() {

                $("#is_signing_authority").change(function() {

                $("#json_rpc_url").closest("tr").css("visibility", this.checked ? "visible" : "hidden");
                      //     = true;//(this.checked);
                    //(this.checked ? this.disabled(true) : this.disabled(fal)
                });

                $(".tabs").tabs();
            });
        </script>
        <!-- Master CSS - Overrides all others -->
        <link type="text/css" rel="stylesheet" href="css/styles.css" />
    </head>
    <body>
        <div class="tabs console">
            <img src="images/logo.png" /><br />
            <div id="header-bar"></div>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td class="menu" align="left" valign="top" width="300">
                        <div class="menu">
                            <ul>
                                <li><a href="#home"><span>Home</span></a></li>
                                <li><a href="#messages"><span>Messages</span></a></li>
                                <li><a href="#create"><span>Create a Certificate</span></a></li>
                                <li><a href="#sign"><span>Sign a Certificate</span></a></li>
                                <li><a href="#manage"><span>Manage Certificates</span></a></li>
                            </ul>
                        </div>
                    </td>
                    <td align="left" valign="top" class="content">
                        <div class="content">
                            <div id="home">
                                <?php include("manager_home.php"); ?>
                            </div>
                            <div id="messages">
                                <?php include("manager_messages.php"); ?>
                            </div>
                            <div id="create">
                                <?php include("manager_create_certificate.php"); ?>
                            </div>
                            <div id="sign">
                                <?php include("manager_sign_certificate.php"); ?>
                            </div>
                            <div id="manage">
                                <?php include("manager_manage_certificates.php"); ?>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div id="footer-bar"></div>
    </body>
</html>
