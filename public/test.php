<?php

class Mail
 {
     private $host;
     private $port;
     private $user;
     private $password;
     private $socket;
     
    public function __construct()
    {

        //所使用邮件服务器
        $this->host = 'smtp.126.com';  

       // 端口号  这里是SSL加密方式，所以使用 465
        $this->port = 465;

       //邮件地址
        $this->user = base64_encode('couwen@126.com');

       //邮件密码
        $this->password = base64_encode('fwp123');
        

        /**

         * 连接服务器

         *

         **/
        $this->socket = stream_socket_client("tcp://{$this->host}:{$this->port}",$errno,$errstr,30);

        /**

         * 将通讯管道设置为加密模式   SSL加密方式

         **/
        stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_SSLv23_CLIENT);
        // 获取服务器的状态码
        $response = fgets($this->socket);

        // 服务器返回状态码不是220 则连接失败
        if(strstr($response,'220') === false){
            echo "连接失败";
        }    

    }    
    

   /**

    *  执行服务器操作

    **/
    public function do_command($cmd,$return_code)
    {
        $result = fwrite($this->socket,$cmd);
        if(!$result){
            echo "发送 {$cmd} 失败.";
        }
        

        // 获取服务器的状态码
        $response = fgets($this->socket);
        print_r($response);
        if(strstr($response,"{$return_code}") === false){
            echo $response;
        }
    }
    

    /**

     *   组合命令发送邮件

     *  @param $from  来源邮箱地址

     *  @param $to  目标邮箱地址

     *  @param $subject  邮件主题

     *  @param $body   邮件内容

     **/
    public function send_mail($from,$to,$subject,$body)
    {
        $detail = "From:{$from}\r\n";
        $detail .= "To:{$to}\r\n";
        $detail .= "Subject:$subject\r\n";
        $detail .= "Content-Type:text/plain;\r\n";
        $detail .= "charset=gb2312\r\n\r\n";
        $detail .= $body;
        $this->do_command("HELO {$this->host}\r\n",250);
        $this->do_command("AUTH LOGIN\r\n",334);
        $this->do_command("{$this->user}\r\n",334);
        $this->do_command("{$this->password}\r\n",235);
        $this->do_command("MAIL FROM: <{$from}>\r\n",250);
        $this->do_command("RCPT TO: <{$to}>\r\n",250);
        $this->do_command("DATA\r\n",354);
        $this->do_command($detail."\r\n.\r\n",250);
        $this->do_command("QUIT\r\n",221);
    }
    

    /**

     * 关闭通讯管道设置为加密模式，套接子

     **/
    public function close()
    {
        stream_socket_enable_crypto($this->socket, false);

        fclose($this->socket);
    }
 }




 $mail = new Mail();
 $body = "hello world";
 $mail->send_mail("couwen@126.com","1044766678@qq.com","testsubject",$body);
 $mail->close();

 ?>