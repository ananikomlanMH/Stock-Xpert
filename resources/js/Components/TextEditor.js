import tinymce from "tinymce";
import "tinymce/models/dom/model.min"
import "tinymce/icons/default/icons.min"
import "tinymce/themes/silver/theme.min"

const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

let template1 = `<div class="mceTmpl">
    <div style='background-color: #ffffff;'>
        <div style='margin: 0px auto; max-width: 600px;'>
            <table style='width: 100%;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                    <td style='direction: ltr; font-size: 0px; padding: 20px 0; padding-bottom: 0px; text-align: center;'>
                        <div class='mj-column-per-100 mj-outlook-group-fix'
                             style='font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;'>
                            <table style='vertical-align: top; height: 139.391px;' role='presentation' border='0'
                                   width='100%' cellspacing='0' cellpadding='0'>
                                <tbody>
                                <tr style='height: 53px;'>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word; height: 53px;'
                                        align='left'>
                                        <table style='border-collapse: collapse; border-spacing: 0px;'
                                               role='presentation' border='0' cellspacing='0' cellpadding='0'>
                                            <tbody>
                                            <tr>
                                                <td style='width: 50px;'><img
                                                        style='border: 0px; display: block; outline: none; text-decoration: none; height: 53px; width: 190px; font-size: 14px;'
                                                        src='https://bn1301files.storage.live.com/y4mBwSgYOI7vUCoWd-a1invRhQ_WKfv3rTx7okZW9Oz-yGNYftPbqyaiq-LbfbZ5oGQC6EIBSCzmK7q1Hg8eT5QOCyc7BMfjQfNqRBBXE1aL56P65IrkDSn5NBZVJWy1l_gwjir91sehNUq56C9mA_H-iVik9UIMil5jjkp1JwGhGjOQ0RV3UQISIhLeOFEx7u7?width=1333&height=371&cropmode=none'
                                                        alt='image description' width='50' height='auto'/></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr style='height: 84px;'>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word; height: 84px;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            <h1 style='margin: 0; font-size: 24px; line-height: normal; font-weight: bold;'>
                                                &nbsp;</h1>
                                            <h1 style='margin: 0; font-size: 24px; line-height: normal; font-weight: bold;'>
                                                Saviez-vous que <span style='color: #104e94;'><strong>PROFISC <span
                                                    style='color: #000000;'>organise </span></strong></span>nouvelle
                                                formation ?</h1>
                                        </div>
                                    </td>
                                </tr>
                                <tr style='height: 2.39062px;'>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word; height: 2.39062px;'>
                                        <p style='border-top: dashed 1px lightgrey; font-size: 1px; margin: 0px auto; width: 100%;'>
                                            &nbsp;</p></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style='margin: 0px auto; max-width: 600px;'>
            <table style='width: 100%;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                    <td style='direction: ltr; font-size: 0px; padding: 20px 0; padding-bottom: 0px; text-align: center;'>
                        <div class='mj-column-per-100 mj-outlook-group-fix'
                             style='font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;'>
                            <table style='vertical-align: top;' role='presentation' border='0' width='100%'
                                   cellspacing='0' cellpadding='0'>
                                <tbody>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            <p style='margin: 0;'>Bonjour , Ibrahima Djibrilla</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            <p style='margin: 0;'>Nous vous informons par la pr&eacute;sente que nous
                                                organisons une nouvelle formation certifiante.</p>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style='margin: 0px auto; max-width: 600px;'>
            <table style='width: 100%;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                    <td style='direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;'>
                        <div class='mj-column-per-100 mj-outlook-group-fix'
                             style='font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;'>
                            <table style='vertical-align: top;' role='presentation' border='0' width='100%'
                                   cellspacing='0' cellpadding='0'>
                                <tbody>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            <p style='margin: 0;'><strong
                                                    style='font-size: 14px; color: #999; line-height: 18px;'>Date D&eacute;but:</strong><br/>Dim.
                                                4 ao&ucirc;t 2022, 08 h 00</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            <p style='margin: 0;'><strong
                                                    style='font-size: 14px; color: #999; line-height: 18px;'>O&ugrave;:</strong><br/>CGP
                                                PROFISC, SONUCI-ZAC, rond point Tourar&eacute;</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            <p style='margin: 0;'><strong
                                                    style='font-size: 14px; color: #999; line-height: 18px;'>Th&egrave;me:</strong><br/>Gestion
                                                comptable, fiscale et sociale des PME</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <table style='border-collapse: separate; line-height: 100%;' role='presentation'
                                               border='0' cellspacing='0' cellpadding='0'>
                                            <tbody>
                                            <tr>
                                                <td style='border: none; border-radius: 30px; cursor: auto; mso-padding-alt: 10px 25px; background: #104e94;'
                                                    role='presentation' align='center' valign='middle'
                                                    bgcolor='#104e94'><a
                                                        style='display: inline-block; background: #104e94; color: #ffffff; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 30px; margin: 0; text-decoration: none; text-transform: uppercase; padding: 10px 25px; mso-padding-alt: 0px; border-radius: 30px;'
                                                        href='http://www.profisc.net/formations-certifiantes/'
                                                        target='_blank' rel='noopener'>EN SAVOIR PLUS SUR LA FORMATION
                                                    ?</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style='margin: 0px auto; max-width: 600px;'>
            <table style='width: 100%;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                    <td style='direction: ltr; font-size: 0px; padding: 20px 0; padding-top: 0px; text-align: center;'>
                        <div class='mj-column-per-100 mj-outlook-group-fix'
                             style='font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;'>
                            <table style='vertical-align: top; height: 98px;' role='presentation' border='0'
                                   width='100%' cellspacing='0' cellpadding='0'>
                                <tbody>
                                <tr style='height: 48px;'>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word; height: 48px;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            Si vous avez de plus d'informations, n'h&eacute;sitez pas &agrave; nous
                                            contacter au <a style='color: #104e94; text-decoration: none;'
                                                            href='mailto:contact@profisc.net'>contact@profisc.net</a>!
                                        </div>
                                    </td>
                                </tr>
                                <tr style='height: 24px;'>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word; height: 24px;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; line-height: 24px; text-align: left; color: #434245;'>
                                            Equipe CGP PROFISC
                                        </div>
                                    </td>
                                </tr>
                                <tr style='height: 26px;'>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word; height: 26px;'
                                        align='left'>
                                        <table style='float: none; display: inline-table;' role='presentation'
                                               border='0' cellspacing='0' cellpadding='0' align='left'>
                                            <tbody>
                                            <tr>
                                                <td style='padding: 4px;'>
                                                    <table style='border-radius: 3px; width: 18px;' role='presentation'
                                                           border='0' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                        <tr>
                                                            <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                                <a style='color: #104e94; text-decoration: none;'
                                                                   href='https://www.facebook.com/CentreDeGestion/'
                                                                   target='_blank' rel='noopener'> <img
                                                                        style='border-radius: 3px; display: block;'
                                                                        src='https://bn1301files.storage.live.com/y4mUaSrdj6Hv3StAaxKklLnaIRbXS3Yu_irw8YWcgdsBmKATL4OqW1R9V2O5llJQ7PVcAeMvGSRlPdwnGk95LcvjwQpRF0ctZmuxx4pbYWA1m-1V7kqr7L2JgWVKLTW6VcKil481U7L8hq63dP1JdpK38qCIb0cc3Y9qjjb6OMB994jY_wVd_w5X0E_gaQc51ag?width=512&height=512&cropmode=none'
                                                                        alt='facebook-logo' width='18' height='18'/>
                                                                </a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table style='float: none; display: inline-table;' role='presentation'
                                               border='0' cellspacing='0' cellpadding='0' align='left'>
                                            <tbody>
                                            <tr>
                                                <td style='padding: 4px;'>
                                                    <table style='border-radius: 3px; width: 18px;' role='presentation'
                                                           border='0' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                        <tr>
                                                            <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                                <a style='color: #104e94; text-decoration: none;'
                                                                   href='https://www.youtube.com/channel/UCY0I-25ZRetA_zv0yaaAJ1A'
                                                                   target='_blank' rel='noopener'> <img
                                                                        style='border-radius: 3px; display: block;'
                                                                        src='https://bn1301files.storage.live.com/y4mQCTZG3w4ewry-kU7Nl2FT0hz6M6B9rUiR02aadk2H81QgHYtMNTwcwNTnaxVE0ZnIQhnKIdBVVtEHUFEvm7NICPhY0M2m9btGhR6FTYpdHUeT-hAHGcIdAmJc8hz0BEqh9Kpto_kNZpHwVlsVdlzweN2aHrvZXijMGnj57MN-HvdWz3xAPLaVRCtdXJvmmzv?width=512&height=512&cropmode=none'
                                                                        width='18' height='18'/> </a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table style='float: none; display: inline-table;' role='presentation'
                                               border='0' cellspacing='0' cellpadding='0' align='left'>
                                            <tbody>
                                            <tr>
                                                <td style='padding: 4px;'>
                                                    <table style='border-radius: 3px; width: 18px;' role='presentation'
                                                           border='0' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                        <tr>
                                                            <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                                <a style='color: #104e94; text-decoration: none;'
                                                                   href='https://www.instagram.com/cgpprofisc/?hl=fr'
                                                                   target='_blank' rel='noopener'> <img
                                                                        style='border-radius: 3px; display: block;'
                                                                        src='https://bn1301files.storage.live.com/y4mwcQyEnx_bXdrTpinXTV9Nw6rSYhiEJElhNlNA3ynoqZc-iE9Bx1O88N8Hi-Ghqj4q3TFw8z_VHvB8ahYYhZnF-6V5XHML-YIhoNwWKOkLCMXxF5IUxBQxJG4ytTQYLD1Y1QXksAp-cMZxZ8nEdFgXGTgXc0mNBzYRu-7zszSpiVhntbVWpzJO-EFT5bT2IGM?width=512&height=512&cropmode=none'
                                                                        alt='instagram-logo' width='18' height='18'/>
                                                                </a></td>

                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table style='float: none; display: inline-table;' role='presentation'
                                               border='0' cellspacing='0' cellpadding='0' align='left'>
                                            <tbody>
                                            <tr>
                                                <td style='padding: 4px;'>
                                                    <table style='border-radius: 3px; width: 18px;' role='presentation'
                                                           border='0' cellspacing='0' cellpadding='0'>
                                                        <tbody>
                                                        <tr>
                                                            <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                                <a style='color: #104e94; text-decoration: none;'
                                                                   href='https://www.linkedin.com/company/cgp-profisc/'
                                                                   target='_blank' rel='noopener'> <img
                                                                        style='border-radius: 3px; display: block;'
                                                                        src='https://bn1301files.storage.live.com/y4mlcd7o0eEUIJ9z5fYmLpgzthDMtj6dWIId6PYqzzLHdYQw1zQPbN9KcZOASNbOa8NsQ24P3emlG95-J9ons6Gp3lOeZnEyiP9m-WEIDtzBYOcYNSO8QtMHwYBYs1H73hUI1_pmSv6vZFekl5Un2mChU_y5pftd3bVabvgL9iyH4_I2hjzW3d3UwvAMeMKmHer?width=512&height=512&cropmode=none'
                                                                        alt='linked-logo' width='18' height='18'/> </a>
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
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style='margin: 0px auto; max-width: 600px;'>
            <table style='width: 100%;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                    <td style='direction: ltr; font-size: 0px; padding: 20px 0; padding-top: 0; text-align: center;'>
                        <div class='mj-column-per-100 mj-outlook-group-fix'
                             style='font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;'>
                            <table style='vertical-align: top;' role='presentation' border='0' width='100%'
                                   cellspacing='0' cellpadding='0'>
                                <tbody>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'>
                                        <p style='border-top: dashed 1px lightgrey; font-size: 1px; margin: 0px auto; width: 100%;'>
                                            &nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; text-align: left; color: #999999;'>
                                            Avez-vous des questions ou besoin d'aide? Envoyez-nous un courriel &agrave;
                                            <a style='color: #104e94; text-decoration: none;'
                                               href='mailto:contact@profisc.net'>contact@profisc.net</a></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>
                                        <div style='font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px; text-align: left; color: #434245;'>
                                            SONUCI-ZAC, rond point Tourar&eacute; &copy; 2022 CGP PROFISC.
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='font-size: 0px; padding: 10px 25px; word-break: break-word;'
                                        align='left'>&nbsp;
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div style='margin: 0px auto; max-width: 600px;'>
            <table style='width: 100%;' role='presentation' border='0' cellspacing='0' cellpadding='0' align='center'>
                <tbody>
                <tr>
                    <td style='direction: ltr; font-size: 0px; padding: 20px 0; text-align: center;'>
                        <div class='mj-column-per-100 mj-outlook-group-fix'
                             style='font-size: 0px; text-align: left; direction: ltr; display: inline-block; vertical-align: top; width: 100%;'>
                            <table style='vertical-align: top;' role='presentation' border='0' width='100%'
                                   cellspacing='0' cellpadding='0'>
                                <tbody>
                                <tr>
                                    <td style='font-size: 0px; word-break: break-word;'>
                                        <div style='height: 1px;'>&nbsp;</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>`

let template2 = `
<style type="text/css">
    #outlook a {
        padding: 0;
    }

    body {
        margin: 0;
        padding: 0;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
    }

    table,
    td {
        border-collapse: collapse;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
    }

    img {
        border: 0;
        height: auto;
        line-height: 100%;
        outline: none;
        text-decoration: none;
        -ms-interpolation-mode: bicubic;
    }

    p {
        display: block;
        margin: 13px 0;
    }
</style>
<style type="text/css">
    @media only screen and (min-width: 480px) {
        .mj-column-per-50 {
            width: 50% !important;
            max-width: 50%;
        }

        .mj-column-per-100 {
            width: 100% !important;
            max-width: 100%;
        }

        .mj-column-per-30 {
            width: 30% !important;
            max-width: 30%;
        }

        .mj-column-per-70 {
            width: 70% !important;
            max-width: 70%;
        }
    }
</style>
<style type="text/css">
    @media only screen and (max-width: 480px) {
        table.mj-full-width-mobile {
            width: 100% !important;
        }

        td.mj-full-width-mobile {
            width: auto !important;
        }
    }
</style>
<style type="text/css">
    a,
    span,
    td,
    th {
        -webkit-font-smoothing: antialiased !important;
        -moz-osx-font-smoothing: grayscale !important;
    }

    .hover:hover td,
    .hover:hover p,
    .hover:hover a {
        background-color: #104e94 !important;
    }
</style>

<div style="background-color:#ffffff;">
   
    <div style="margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;text-align:center;">
                 
                    <div class="mj-column-per-50 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:middle;" width="100%">
                            <tbody>
                            <tr>
                                <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:150px;">
                                                <img style="border: 0px; display: block; outline: none; text-decoration: none;width: 150px; font-size: 14px;"
                                                     src="https://bn1301files.storage.live.com/y4mBwSgYOI7vUCoWd-a1invRhQ_WKfv3rTx7okZW9Oz-yGNYftPbqyaiq-LbfbZ5oGQC6EIBSCzmK7q1Hg8eT5QOCyc7BMfjQfNqRBBXE1aL56P65IrkDSn5NBZVJWy1l_gwjir91sehNUq56C9mA_H-iVik9UIMil5jjkp1JwGhGjOQ0RV3UQISIhLeOFEx7u7?width=1333&amp;height=371&amp;cropmode=none"
                                                     alt="" width="50" height="auto">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                  
                    <div class="mj-column-per-50 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:middle;" width="100%">
                            <tbody>
                            <tr>
                                <td align="right" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                  
                                    <table style="float: none; display: inline-table;" role="presentation" border="0"
                                           cellspacing="0" cellpadding="0" align="left">
                                        <tbody>
                                        <tr>
                                            <td style="padding: 4px;">
                                                <table style="border-radius: 3px; width: 18px;" role="presentation"
                                                       border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td style="font-size: 0; height: 18px; vertical-align: middle; width: 18px;">
                                                            <a style="color: #104e94; text-decoration: none;"
                                                               href="https://www.facebook.com/CentreDeGestion/"
                                                               target="_blank" rel="noopener"> <img
                                                                    style="border-radius: 3px; display: block;"
                                                                    src="https://bn1301files.storage.live.com/y4mUaSrdj6Hv3StAaxKklLnaIRbXS3Yu_irw8YWcgdsBmKATL4OqW1R9V2O5llJQ7PVcAeMvGSRlPdwnGk95LcvjwQpRF0ctZmuxx4pbYWA1m-1V7kqr7L2JgWVKLTW6VcKil481U7L8hq63dP1JdpK38qCIb0cc3Y9qjjb6OMB994jY_wVd_w5X0E_gaQc51ag?width=512&amp;height=512&amp;cropmode=none"
                                                                    alt="" width="18" height="18"> </a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <table style='float: none; display: inline-table;' role='presentation' border='0'
                                           cellspacing='0' cellpadding='0' align='left'>
                                        <tbody>
                                        <tr>
                                            <td style='padding: 4px;'>
                                                <table style='border-radius: 3px; width: 18px;' role='presentation'
                                                       border='0' cellspacing='0' cellpadding='0'>
                                                    <tbody>
                                                    <tr>
                                                        <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                            <a style='color: #104e94; text-decoration: none;'
                                                               href='https://www.youtube.com/channel/UCY0I-25ZRetA_zv0yaaAJ1A'
                                                               target='_blank' rel='noopener'> <img
                                                                    style='border-radius: 3px; display: block;'
                                                                    src='https://bn1301files.storage.live.com/y4mQCTZG3w4ewry-kU7Nl2FT0hz6M6B9rUiR02aadk2H81QgHYtMNTwcwNTnaxVE0ZnIQhnKIdBVVtEHUFEvm7NICPhY0M2m9btGhR6FTYpdHUeT-hAHGcIdAmJc8hz0BEqh9Kpto_kNZpHwVlsVdlzweN2aHrvZXijMGnj57MN-HvdWz3xAPLaVRCtdXJvmmzv?width=512&height=512&cropmode=none'
                                                                    width='18' height='18'/> </a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table style='float: none; display: inline-table;' role='presentation' border='0'
                                           cellspacing='0' cellpadding='0' align='left'>
                                        <tbody>
                                        <tr>
                                            <td style='padding: 4px;'>
                                                <table style='border-radius: 3px; width: 18px;' role='presentation'
                                                       border='0' cellspacing='0' cellpadding='0'>
                                                    <tbody>
                                                    <tr>
                                                        <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                            <a style='color: #104e94; text-decoration: none;'
                                                               href='https://www.instagram.com/cgpprofisc/?hl=fr'
                                                               target='_blank' rel='noopener'> <img
                                                                    style='border-radius: 3px; display: block;'
                                                                    src='https://bn1301files.storage.live.com/y4mwcQyEnx_bXdrTpinXTV9Nw6rSYhiEJElhNlNA3ynoqZc-iE9Bx1O88N8Hi-Ghqj4q3TFw8z_VHvB8ahYYhZnF-6V5XHML-YIhoNwWKOkLCMXxF5IUxBQxJG4ytTQYLD1Y1QXksAp-cMZxZ8nEdFgXGTgXc0mNBzYRu-7zszSpiVhntbVWpzJO-EFT5bT2IGM?width=512&height=512&cropmode=none'
                                                                    alt='' width='18' height='18'/> </a></td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table style='float: none; display: inline-table;' role='presentation' border='0'
                                           cellspacing='0' cellpadding='0' align='left'>
                                        <tbody>
                                        <tr>
                                            <td style='padding: 4px;'>
                                                <table style='border-radius: 3px; width: 18px;' role='presentation'
                                                       border='0' cellspacing='0' cellpadding='0'>
                                                    <tbody>
                                                    <tr>
                                                        <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                            <a style='color: #104e94; text-decoration: none;'
                                                               href='https://www.linkedin.com/company/cgp-profisc/'
                                                               target='_blank' rel='noopener'> <img
                                                                    style='border-radius: 3px; display: block;'
                                                                    src='https://bn1301files.storage.live.com/y4mlcd7o0eEUIJ9z5fYmLpgzthDMtj6dWIId6PYqzzLHdYQw1zQPbN9KcZOASNbOa8NsQ24P3emlG95-J9ons6Gp3lOeZnEyiP9m-WEIDtzBYOcYNSO8QtMHwYBYs1H73hUI1_pmSv6vZFekl5Un2mChU_y5pftd3bVabvgL9iyH4_I2hjzW3d3UwvAMeMKmHer?width=512&height=512&cropmode=none'
                                                                    alt='' width='18' height='18'/> </a></td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                  
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                   
                    <div class="mj-column-per-100 mj-outlook-group-fix"
                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="vertical-align:top;" width="100%">
                            <tbody>
                            <tr>
                                <td align="center" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                           style="border-collapse:collapse;border-spacing:0px;">
                                        <tbody>
                                        <tr>
                                            <td style="width:550px;">
                                                <img alt="" height="auto"
                                                     src="http://www.profisc.net/wp-content/uploads/2022/05/expert-comptable-768x512-1.jpg"
                                                     style="border-radius: 5px;border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:14px;"
                                                     width="550"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                   
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div style="margin:0px auto;max-width:600px;">
        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;">
            <tbody>
            <tr>
                <td style="direction:ltr;font-size:0px;padding:0 40px;text-align:center;">
                    
                    <div style="margin:0px auto;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="width:100%;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                    
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:top;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#000000;">
                                                        <h1 style="margin: 0; font-size: 32px; line-height: 40px;">
                                                            Bonjour <span
                                                                style="color: #104e94;">M. Ibrahima</span>, </br>Voici
                                                            les métiers de front office de l’Administration fiscale...
                                                        </h1>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="margin:0px auto;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="width:100%;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:0;text-align:center;">
                                   
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:top;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#000000;">
                                                        <p style="margin: 0;">L’Administration fiscale est au cœur du
                                                            fonctionnement de l’Etat. Par son rôle de pourvoyeur de
                                                            ressources internes, ses performances influencent fortement
                                                            le fonctionnement des autres services de l’Etat </br></br>
                                                            Traditionnellement, l’Administration fiscale est chargée de
                                                            la mise en œuvre de la politique fiscale du gouvernement
                                                            afin de maximiser la mobilisation des recettes fiscales
                                                            nécessaires au financement du budget de l’Etat et de ses
                                                            démembrements...
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" vertical-align="middle"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:separate;line-height:100%;">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center" bgcolor="#104e94" role="presentation"
                                                                style="border:none;border-radius:3px;cursor:auto;mso-padding-alt:10px 25px;background:#104e94;"
                                                                valign="middle">
                                                                <a href="http://www.profisc.net/les-metiers-de-front-office-de-ladministration-fiscale/"
                                                                   style="display: inline-block; background: #104e94; color: #ffffff; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 30px; margin: 0; text-decoration: none; text-transform: uppercase; padding: 10px 25px; mso-padding-alt: 0px; border-radius: 3px;"
                                                                   target="_blank">
                                                                    <strong>Lire Plus</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="margin:0px auto;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="width:100%;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                    
                                    <div class="mj-column-per-30 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:middle;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:collapse;border-spacing:0px;"
                                                           class="mj-full-width-mobile">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:106px;" class="mj-full-width-mobile">
                                                                <img height="auto"
                                                                     src="http://www.profisc.net/wp-content/uploads/2022/05/10666710.webp"
                                                                     style="border-radius: 5px;border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:14px;"
                                                                     width="106"/>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="mj-column-per-70 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:middle;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#000000;">
                                                        <p class="date"
                                                           style="margin: 0; margin-bottom: 5px; font-size: 14px;">25
                                                            Mai 2022</p>
                                                        <h3 style="margin: 0; font-size: 18px; line-height: 22px;"><a
                                                                href="http://www.profisc.net/7-choses-quun-comptable-financier-ou-fiscaliste-dong-devrait-savoir/"
                                                                style="color: #104e94; text-decoration: none;">7 choses
                                                            qu’un comptable, financier ou fiscaliste d’ONG devrait
                                                            savoir…</a></h3>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="margin:0px auto;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="width:100%;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                    
                                    <div class="mj-column-per-30 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:middle;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:collapse;border-spacing:0px;"
                                                           class="mj-full-width-mobile">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:106px;" class="mj-full-width-mobile">
                                                                <img height="auto"
                                                                     src="http://www.profisc.net/wp-content/uploads/2022/05/droiterreur.jpeg"
                                                                     style="border-radius: 5px;border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:14px;"
                                                                     width="106"/>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                    <div class="mj-column-per-70 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:middle;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:middle;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#000000;">
                                                        <p class="date"
                                                           style="margin: 0; margin-bottom: 5px; font-size: 14px;">25
                                                            Mai 2022</p>
                                                        <h3 style="margin: 0; font-size: 18px; line-height: 22px;"><a
                                                                href="http://www.profisc.net/7-erreurs-commises-par-les-entrepreneurs/"
                                                                style="color: #104e94; text-decoration: none;">7 ERREURS
                                                            COMMISES PAR LES ENTREPRENEURS</a></h3>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="background:#104e94;background-color:#104e94;margin:0px auto;border-radius:4px;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="background:#104e94;background-color:#104e94;width:100%;border-radius:4px;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                   
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:top;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:bold;line-height:24px;text-align:left;color:#ffffff;">
                                                        <p class="date"
                                                           style="margin: 0; margin-bottom: 5px; font-size: 14px;">
                                                            ARTICLE POPULAIRE</p>
                                                        <h2 style="margin: 0; font-size: 24px; line-height: 30px;">Les
                                                            métiers de front office de l’Administration fiscale.</h2>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:24px;text-align:left;color:#ffffff;">
                                                        <p style="margin: 0;">L’Administration fiscale est au cœur du
                                                            fonctionnement de l’Etat. Par son rôle de pourvoyeur de
                                                            ressources internes, ses performances influencent fortement
                                                            le fonctionnement des autres services de l’Etat...</p>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" vertical-align="middle"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:separate;line-height:100%;">
                                                        <tbody>
                                                        <tr>
                                                            <td align="center" bgcolor="#ffffff" role="presentation"
                                                                style="border:none;border-radius:3px;cursor:auto;mso-padding-alt:10px 25px;background:#ffffff;"
                                                                valign="middle">
                                                                <a href="http://www.profisc.net/les-metiers-de-front-office-de-ladministration-fiscale/"
                                                                   style="display: inline-block; background: #ffffff; color: #104e94; font-family: Helvetica, Arial, sans-serif; font-size: 14px; font-weight: bold; line-height: 30px; margin: 0; text-decoration: none; text-transform: uppercase; padding: 10px 25px; mso-padding-alt: 0px; border-radius: 3px;"
                                                                   target="_blank">
                                                                    <strong>LIRE PLUS</strong>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                   
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="margin:0px auto;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="width:100%;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                    
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:top;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td align="left"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:400;line-height:24px;text-align:left;color:#333333;">
                                                        Avez-vous des questions ou besoin d'aide ? Envoyez-nous un
                                                        courriel à <a href="mailto:contact@profisc.net"
                                                                      style="color: #104e94; text-decoration: none;">
                                                        contact@profisc.net </a></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="margin:0px auto;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="width:100%;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:0px;text-align:center;">
                                   
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:top;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <p style="border-top: solid 1px #f4f4f4; font-size: 1px; margin: 0px auto; width: 100%;">
                                                    </p>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:400;line-height:24px;text-align:center;color:#333333;">
                                                        <a class="footer-link" href="http://www.profisc.net/a-propos/"
                                                           style="text-decoration: none; color: #000;">A Propos</a>   |
                                                          <a class="footer-link"
                                                             href="http://www.profisc.net/services-fiscaux/"
                                                             style="text-decoration: none; color: #000;">Services</a>  
                                                        |  <a class="footer-link"
                                                              href="http://www.profisc.net/formations-certifiantes/"
                                                              style="text-decoration: none; color: #000;">Formations</a>
                                                          |  <a class="footer-link"
                                                                href="http://www.profisc.net/contact/"
                                                                style="text-decoration: none; color: #000;">Contact</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table style="float: none; display: inline-table;"
                                                           role="presentation" border="0" cellspacing="0"
                                                           cellpadding="0" align="left">
                                                        <tbody>
                                                        <tr>
                                                            <td style="padding: 4px;">
                                                                <table style="border-radius: 3px; width: 18px;"
                                                                       role="presentation" border="0" cellspacing="0"
                                                                       cellpadding="0">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="font-size: 0; height: 18px; vertical-align: middle; width: 18px;">
                                                                            <a style="color: #104e94; text-decoration: none;"
                                                                               href="https://www.facebook.com/CentreDeGestion/"
                                                                               target="_blank" rel="noopener"> <img
                                                                                    style="border-radius: 3px; display: block;"
                                                                                    src="https://bn1301files.storage.live.com/y4mUaSrdj6Hv3StAaxKklLnaIRbXS3Yu_irw8YWcgdsBmKATL4OqW1R9V2O5llJQ7PVcAeMvGSRlPdwnGk95LcvjwQpRF0ctZmuxx4pbYWA1m-1V7kqr7L2JgWVKLTW6VcKil481U7L8hq63dP1JdpK38qCIb0cc3Y9qjjb6OMB994jY_wVd_w5X0E_gaQc51ag?width=512&amp;height=512&amp;cropmode=none"
                                                                                    alt="facebook-logo" width="18"
                                                                                    height="18"> </a></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                    <table style='float: none; display: inline-table;'
                                                           role='presentation' border='0' cellspacing='0'
                                                           cellpadding='0' align='left'>
                                                        <tbody>
                                                        <tr>
                                                            <td style='padding: 4px;'>
                                                                <table style='border-radius: 3px; width: 18px;'
                                                                       role='presentation' border='0' cellspacing='0'
                                                                       cellpadding='0'>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                                            <a style='color: #104e94; text-decoration: none;'
                                                                               href='https://www.youtube.com/channel/UCY0I-25ZRetA_zv0yaaAJ1A'
                                                                               target='_blank' rel='noopener'> <img
                                                                                    style='border-radius: 3px; display: block;'
                                                                                    src='https://bn1301files.storage.live.com/y4mQCTZG3w4ewry-kU7Nl2FT0hz6M6B9rUiR02aadk2H81QgHYtMNTwcwNTnaxVE0ZnIQhnKIdBVVtEHUFEvm7NICPhY0M2m9btGhR6FTYpdHUeT-hAHGcIdAmJc8hz0BEqh9Kpto_kNZpHwVlsVdlzweN2aHrvZXijMGnj57MN-HvdWz3xAPLaVRCtdXJvmmzv?width=512&height=512&cropmode=none'
                                                                                    width='18' height='18'/> </a></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table style='float: none; display: inline-table;'
                                                           role='presentation' border='0' cellspacing='0'
                                                           cellpadding='0' align='left'>
                                                        <tbody>
                                                        <tr>
                                                            <td style='padding: 4px;'>
                                                                <table style='border-radius: 3px; width: 18px;'
                                                                       role='presentation' border='0' cellspacing='0'
                                                                       cellpadding='0'>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                                            <a style='color: #104e94; text-decoration: none;'
                                                                               href='https://www.instagram.com/cgpprofisc/?hl=fr'
                                                                               target='_blank' rel='noopener'> <img
                                                                                    style='border-radius: 3px; display: block;'
                                                                                    src='https://bn1301files.storage.live.com/y4mwcQyEnx_bXdrTpinXTV9Nw6rSYhiEJElhNlNA3ynoqZc-iE9Bx1O88N8Hi-Ghqj4q3TFw8z_VHvB8ahYYhZnF-6V5XHML-YIhoNwWKOkLCMXxF5IUxBQxJG4ytTQYLD1Y1QXksAp-cMZxZ8nEdFgXGTgXc0mNBzYRu-7zszSpiVhntbVWpzJO-EFT5bT2IGM?width=512&height=512&cropmode=none'
                                                                                    alt='instagram-logo' width='18'
                                                                                    height='18'/> </a></td>

                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table style='float: none; display: inline-table;'
                                                           role='presentation' border='0' cellspacing='0'
                                                           cellpadding='0' align='left'>
                                                        <tbody>
                                                        <tr>
                                                            <td style='padding: 4px;'>
                                                                <table style='border-radius: 3px; width: 18px;'
                                                                       role='presentation' border='0' cellspacing='0'
                                                                       cellpadding='0'>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style='font-size: 0; height: 18px; vertical-align: middle; width: 18px;'>
                                                                            <a style='color: #104e94; text-decoration: none;'
                                                                               href='https://www.linkedin.com/company/cgp-profisc/'
                                                                               target='_blank' rel='noopener'> <img
                                                                                    style='border-radius: 3px; display: block;'
                                                                                    src='https://bn1301files.storage.live.com/y4mlcd7o0eEUIJ9z5fYmLpgzthDMtj6dWIId6PYqzzLHdYQw1zQPbN9KcZOASNbOa8NsQ24P3emlG95-J9ons6Gp3lOeZnEyiP9m-WEIDtzBYOcYNSO8QtMHwYBYs1H73hUI1_pmSv6vZFekl5Un2mChU_y5pftd3bVabvgL9iyH4_I2hjzW3d3UwvAMeMKmHer?width=512&height=512&cropmode=none'
                                                                                    alt='linked-logo' width='18'
                                                                                    height='18'/> </a></td>

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
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <div style="font-family:Helvetica, Arial, sans-serif;font-size:14px;font-weight:400;line-height:24px;text-align:center;color:#333333;">
                                                        SONUCI-ZAC, rond point Touraré, Niamey - Niger </br>© 2022 CGP
                                                        PROFISC.
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center"
                                                    style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                                    <table border="0" cellpadding="0" cellspacing="0"
                                                           role="presentation"
                                                           style="border-collapse:collapse;border-spacing:0px;">
                                                        <tbody>
                                                        <tr>
                                                            <td style="width:50px;">
                                                                <img alt="image description" height="auto"
                                                                     src="https://bn1301files.storage.live.com/y4mBwSgYOI7vUCoWd-a1invRhQ_WKfv3rTx7okZW9Oz-yGNYftPbqyaiq-LbfbZ5oGQC6EIBSCzmK7q1Hg8eT5QOCyc7BMfjQfNqRBBXE1aL56P65IrkDSn5NBZVJWy1l_gwjir91sehNUq56C9mA_H-iVik9UIMil5jjkp1JwGhGjOQ0RV3UQISIhLeOFEx7u7?width=1333&height=371&cropmode=none"
                                                                     style="border:0;display:block;outline:none;text-decoration:none;height:auto;width:100%;font-size:14px;"
                                                                     width="50"/>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div style="margin:0px auto;max-width:520px;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                               style="width:100%;">
                            <tbody>
                            <tr>
                                <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                                   
                                    <div class="mj-column-per-100 mj-outlook-group-fix"
                                         style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                                        <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                               style="vertical-align:top;" width="100%">
                                            <tbody>
                                            <tr>
                                                <td style="font-size:0px;word-break:break-word;">
                                                  
                                                    <div style="height:1px;">  </div>
                                                   
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
                        `

export class TextEditor extends HTMLTextAreaElement {

    connectedCallback() {
        this.textarea = tinymce.init({
            selector: 'textarea#' + this.id,
            promotion: false,
            language: "fr_FR",
            height: 'calc(100vh - 280px)',
            // tools
            plugins: 'preview importcss searchreplace autolink directionality template code visualblocks visualchars fullscreen image link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media templates link anchor | ltr rtl',
            toolbar_sticky: true,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            quickbars_insert_toolbar: false,
            image_advtab: true,
            link_list: [
                {title: 'PROFISC NIGER', value: 'https://www.profisc.net'},
            ],
            image_list: [
                {
                    title: 'CGP LOGISTICS',
                    value: 'https://www.profisc.net/wp-content/uploads/2023/03/logo_logistics.png'
                },
                {title: 'CGP PROFISC', value: 'https://www.profisc.net/wp-content/uploads/2022/05/Fichier-fianale.png'}
            ],
            image_class_list: [
                {title: 'Aucune', value: ''}
            ],
            templates: [
                {
                    title: 'Modèle 1',
                    description: "Modèle 1",
                    content: template1
                },
                {
                    title: 'Modèle 2',
                    description: "Modèle 2",
                    content: template2
                }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.profisc.net/wp-content/uploads/2023/03/logo_logistics.png', {text: 'CGP PROFISC'});
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.profisc.net/wp-content/uploads/2023/03/logo_logistics.png', {alt: 'CGP PROFISC'});
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.profisc.net/wp-content/uploads/2023/03/logo_logistics.png'
                    });
                }
            },
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    }

    disconnectedCallback() {
        tinymce.remove()
    }
}

