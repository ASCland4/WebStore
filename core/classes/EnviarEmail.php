<?Php

namespace core\classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EnviarEmail
{

    // ===================================================================
    public function enviar_email_confirmacao_novo_cliente($email_cliente, $purl)
    {

        // Envia um email para o novo cliente para ser feita a comfirmação pelo email

        // Constroi o purl (link para validação do email)
        $link = BASE_URL . '?a=confirmar_email&purl=' . $purl;

        $mail = new PHPMailer(true);

        try {

            // Opções do servidor
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Enable verbose debug output
            $mail->isSMTP();                                      // Send using SMTP
            $mail->Host       = EMAIL_HOST;                       // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                             // Enable SMTP authentication
            $mail->Username   = EMAIL_FROM;                       // SMTP username
            $mail->Password   = EMAIL_PASS;                       // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                       // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->CharSet    = 'UTF-8';

            // Emissor e recetor
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente);                    // Add a recipient

            // Assunto
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = APP_NAME . ' - Confirmação de email.';

            // Mensagem
            $html = '<p>Seja bem-vindo à nossa loja ' . APP_NAME . '</p>';
            $html .= '<p>Para poder entra na nosssa loja, necessita confirmar o seu email.</p>';
            $html .= '<p>Para confirmar o email, clique no link abaixo:</p>';
            $html .= '<p><a href="' . $link . '">Confirmar Email</a></p>';
            $html .= '<p><i><small></small></i></p>';

            $mail->Body   = $html;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function enviar_email_confirmacao_encomenda($email_cliente, $dados_encomenda)
    {
        // envia um email para o novo cliente no sentido de confirmar o email

        $mail = new PHPMailer(true);

        try {

            // opções do servidor
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host       = EMAIL_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = EMAIL_FROM;
            $mail->Password   = EMAIL_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = EMAIL_PORT;
            $mail->CharSet    = 'UTF-8';

            // emissor e recetor
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente);

            // assunto
            $mail->isHTML(true);
            $mail->Subject = APP_NAME . ' - Confirmação de encomenda - ' . $dados_encomenda['dados_pagamento']['codigo_encomenda'];

            // mensagem
            $html = '<p>Este email serve para confimar a sua encomenda.</p>';
            $html .= '<p>Dados da encomenda:</p>';

            // lista dos produtos
            $html .= '<ul>';
            foreach ($dados_encomenda['lista_produtos'] as $produto) {
                $html .= "<li>$produto</li>";
            }
            $html .= '</ul>';

            // total
            $html .= '<p>Total: <strong>' . $dados_encomenda['total'] . '</strong></p>';

            // dados de pagamento
            $html .= '<hr>';
            $html .= '<p>DADOS DE PAGAMENTO:</p>';
            $html .= '<p>Número da conta: <strong>' . $dados_encomenda['dados_pagamento']['numero_da_conta'] . '</strong></p>';
            $html .= '<p>Código da encomenda: <strong>' . $dados_encomenda['dados_pagamento']['codigo_encomenda'] . '</strong></p>';
            $html .= '<p>Valor a pagar: <strong>' . $dados_encomenda['dados_pagamento']['total'] . '</strong></p>';
            $html .= '<hr>';

            // nota importante
            $html .= '<p>NOTA: A sua encomenda só será processada após pagamento.</p>';

            $mail->Body = $html;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}