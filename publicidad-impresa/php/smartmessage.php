<?php
$UrlWeb="http://diario16.marostsac.com/publicidad-impresa/verify.php?id=".$activacion_codigo;
$message = '
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Diario16 - Confirmar correo</title>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <center>
        <table style="padding:30px 10px;background:#F4F4F4;width:100%;font-family:arial" cellpadding="0" cellspacing="0">
                
                <tbody>
                    <tr>
                        <td>
                        
                            <table style="max-width:600px;min-width:320px" align="center" cellspacing="0">
                                <tbody>
                                
                                    <tr>
                                        <td style="background:#fff;border:1px solid #D8D8D8;padding:30px 30px" align="center">
                                        
                                            <table align="center">
                                                <tbody>
                                                
                                                    <tr>
                                                        <td style="border-bottom:1px solid #D8D8D8;color:#666;text-align:center;padding-bottom:30px">
                                                            
                                                            <table style="margin:auto" align="center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="color:#005f84;font-size:22px;font-weight:bold;text-align:center;font-family:arial">
                                                                            Confirmar correo
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                               <td style="color:#666;padding:15px; padding-bottom:0;font-size:14px;line-height:20px;font-family:arial;text-align:left">
                                    
                                                    <div style="font-style:normal;padding-bottom:15px;font-family:arial;line-height:20px;text-align:left">

                                                        <p>Hola '.$_POST["rciud_nombre"].',</p>
                                                        <p><span style="font-weight:bold;font-size:16px">Diario16</span></p>
                                                        
                                                        <div style="background-color:#E42914;border-radius:5px;border:1px solid #E42914;padding:5px 0 5px 0;text-align:center;width:220px;margin-bottom:20px;">
                                                            <div style="padding-left:30px;padding-right:30px">
                                                                <span><a style="white-space: nowrap;text-decoration:none;color:#ffffff;font-size:13px;font-weight:bold;" href="'.$UrlWeb.'" target="_blank">Confirma tu cuenta ahora</a></span>
                                                            </div>
                                                        </div>

                                                        <p>Si haces clic en el boton y parece que no funciona, cópialo y pégalo en una nueva ventana de tu navegador el siguiente enlace:</p>
                                                        <p><a href="'.$UrlWeb.'" style="word-wrap: break-word;">'.$UrlWeb.'</a></p>
                                                        
                                                      </div>
                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td style="background:#f9f9f9;border:1px solid #D8D8D8;border-top:none;padding:24px 10px" align="center">
                                            
                                            <table style="width:100%;max-width:650px" align="center">
                                                <tbody>
                                                
                                                    <tr>
                                                        <td style="font-size:20px;line-height:27px;text-align:center;max-width:650px">
        
                                                            <a href="http://www.doptiq.com/smart-forms" style="text-decoration:none;color:#69696c" target="_blank">
                                                                Diario16
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <table style="max-width:650px" align="center">
                                
                                <tbody>
                                    <tr>
                                        <td style="color:#b4b4b4;font-size:11px;padding-top:10px;line-height:15px;font-family:arial">
                                            <span> &copy; 2014 - TODOS LOS DERECHOS RESERVADOS </span>
                                        </td>
            
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
            </tbody>
        </table>
    </center>
</body>
</html>';
?>