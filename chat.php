
<div style="padding:0;"class="block">
<script>

$(function(){
    var chat = $('#chat')[0]; // Окно чата
    var form = $('#chat-form')[0]; // форма
    
    // вешаем обработчик на отправку формы
    $('#chat-form').submit(function(event){
        
        // поле ввода
        var text = $(form).find('textarea');

        // выключаем форму пока не пришел ответ
        $(form).find('textarea').attr("disabled", true);
     
        // отправка сообщения
        update(text);
        
        // что бы форма не перезагружала страницу
        return false;
    });
    
    function update(text) {
        // что шлём
        var send_data = { last_id: $(chat).attr('data-last-id') };
        if (text)
            send_data.text = $(text).val();
        // шлём запрос
        $.post(
            <?php if($_GET['t'] == 'uch'){echo" 'ajax1.php',";  } else echo" 'ajax.php',"; ?> 
            send_data, // отдаём скрипту данные
            function (data) {
                // ссылка пришла?
                if (data && $.isArray(data)) {
                    $(data).each(function (k) {
                        // формируем наше сообщение
                        var msg = $('<div class="mail"><span class="date">' + data[k].created + '</span> <span class="name">' + data[k].u_id + '</span><div style="clear:both"></div><br><span class="text"> ' + data[k].text + '</span></div>');
                        // и цепляем его к чату
                        $(chat).append(msg);
                        // если ласт ид меньше пришедшего
                        if (parseInt($(chat).attr('data-last-id')) < data[k].id)
                            // запоминаем новый ласт ид
                            $(chat).attr('data-last-id', data[k].id);
                    });
                    
                    // если это отправка, то при получении ответа, включаем форму
                    if (text) {
                        // вклчюаем форму
                        $(form).find('textarea').attr("disabled", false);
                        // и очищаем текст
                        $(text).val('');
                    }

                    // прокрутка
                    $(chat).scrollTop(chat.scrollHeight);

                    // обновим таймер 
                    update_timer();
                }
            },
            'JSON' // полученные данные рассматривать как JSON объект
        );
    }

    // что бы при загрузке получить данные в чат, вызываем сразу апдейт
    update();
    
    // что бы окно чата обновлялось раз в 5 секунд, прицепим таймер
    var timer;
    function update_timer() {
        if (timer) // если таймер уже был, сбрасываем
            clearTimeout(timer);
        timer = setTimeout(function () {
            update();
        }, 5000);
    }
    update_timer();
});
</script>

<style>
    .date{color:#d0d0d0; float:right;}
    .name{float:left; color:#1cb24a; font-size: 13pt;}
    .text{padding-top:10px;font-weight: 300;}
    .mail{padding:10px 20px;border-top:1px solid #d3d3d3;}
       .slil{background:#405A48;border-radius:5px; font-size:12pt; font-weight:300;border:1px solid #405A48} 
    .lil{margin-right:10px; }
    
#chat {padding:10px 0;background:#fff;overflow-y: auto; height: 30%; }
    #chat-top{background:#eee;padding:0 10px; border-bottom:4px solid #2bbc57;}
    
    #chat-form{background:#eee;padding:15px; border-top:1px solid #d3d3d3;}
    
    #text{padding:20px 15px; border:0; border-left:3px solid #405A48; font-size:12pt; width:100%;max-width:925px;}
    
textarea:focus{outline:none;}
input:focus{outline:none;}
    #knopka{background:#405A48; border:0; padding:10px; width:100%; color:#E9F9EE;}
    #knopka:hover{cursor:pointer; background: #4DA167;
  color: #405A48;} 
    
 

</style>
<div id="chat-top"> <ul id="menu"><?php
$id = $_SESSION['id'];
  $result = mysql_query("SELECT * FROM user_info WHERE uid='$id'",$connection);
    $myrow = mysql_fetch_array($result);
if(!empty($myrow['type'])){ echo'<li  class="lil"><a href="index.php?p=chat&t=uch" class="slil">Чат для учителей</a></li>';} ?><li  class="lil"><a href="index.php?p=chat" class="slil">Общий чат</a></li></ul></div>
    <div id="chat" data-last-id="0"></div>
 
<form id="chat-form">
    <textarea id="text" type="text" id="chat-msg" placeholder="Ваше сообщение..."></textarea>
    <input id="knopka" class="anim" type="submit" value="ОТПРАВИТЬ"/>
</form>
</div>