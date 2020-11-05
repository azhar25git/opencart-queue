<?php
/**
 * mail.php
 * Project Opencart Queue
 * Created by jimmyphong.
 * Date: 9/11/20
 */
namespace Queue;

class Mail extends Queue {
   public function perform()
   {
       $data = $this->args;
       if (empty($data['from']) || empty($data['to']) || empty($data['sender']) || empty($data['subject'])){
           throw new \Exception('Input data is missing please check from || to || sender || subject');
       }

       //Setup mail
       $mail = new \Mail($this->config->get('config_mail_engine'));
       $mail->parameter = $this->config->get('config_mail_parameter');
       $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
       $mail->smtp_username = $this->config->get('config_mail_smtp_username');
       $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
       $mail->smtp_port = $this->config->get('config_mail_smtp_port');
       $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

       //Sent
       $mail->setTo($data['to']);
       $mail->setFrom($data['from']);
       $mail->setSender(html_entity_decode($data['sender'], ENT_QUOTES, 'UTF-8'));
       $mail->setSubject(html_entity_decode($data['subject'], ENT_QUOTES, 'UTF-8'));
       $mail->setHtml($data['message']);
       $mail->send();
   }
}