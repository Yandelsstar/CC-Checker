<?php


include __DIR__."/config/config.php";
include __DIR__."/config/variables.php";
include __DIR__."/functions/bot.php";
include __DIR__."/functions/functions.php";
include __DIR__."/functions/db.php";


date_default_timezone_set($config['timeZone']);


////Modules
include __DIR__."/modules/admin.php";
include __DIR__."/modules/skcheck.php";
include __DIR__."/modules/binlookup.php";
include __DIR__."/modules/iban.php";
include __DIR__."/modules/stats.php";
include __DIR__."/modules/me.php";
include __DIR__."/modules/apikey.php";


include __DIR__."/modules/checker/ss.php";
include __DIR__."/modules/checker/schk.php";
include __DIR__."/modules/checker/sm.php";



//////////////===[START]===//////////////

if(strpos($message, "/start") === 0){
if(!isBanned($userId) && !isMuted($userId)){

  if($userId == $config['adminID']){
    $messagesec = "<b>Type /admin to know admin commands</b>";
  }

    addUser($userId);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<b>Hello @$username,

Type /cmds to know all my commands!</b>

$messagesec",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
    'reply_markup'=>json_encode(['inline_keyboard' => [
        [
          ['text' => "🌚OWNER", 'url' => "t.me/ArpitaX"]
        ],
        [
          ['text' => "🌝 OUR CHANNEL 🌝", 'url' => "t.me/Karding666"]
        ],
        [
          ['text' => "👀 DONATE AWS", 'url' => "t.me/ArpitaX"]
        ], 
      ], 'resize_keyboard' => true])
        
    ]);
  }
}

//////////////===[CMDS]===//////////////

if(strpos($message, "/cmds") === 0 || strpos($message, "!cmds") === 0){

  if(!isBanned($userId) && !isMuted($userId)){
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>Which commands would you like to check?</b>",
    'parse_mode'=>'html',
    'reply_to_message_id'=> $message_id,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>"💳 Checker Gates",'callback_data'=>"checkergates"]],[['text'=>'🤕 Other Commands",'callback_data'=>"othercmds"]],
    ],'resize_keyboard'=>true])
    ]);
  }
  
  }
  
  if($data == "back"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>Which commands would you like to check?</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>"💳 Checker Gates",'callback_data'=>"checkergates"]],[['text'=>'🤕 Other Commands",'callback_data'=>"othercmds"]],
    ],'resize_keyboard'=>true])
    ]);
  }
  
  if($data == "checkergates"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>🔱➕➕  CC Checker Gate  ➕➕🔱</b>
  
<b>/ss | !ss -</b> Stripe [Auth]
<b>/sm | !sm -</b> Stripe [Merchant]
<b>/schk | !schk -</b> User Stripe Merchant [Needs SK]

<b>/apikey sk_live_xxx -</b>Add SK Key for /schk gate
<b>/myapikey | !myapikey -</b> View the added SK Key for /schk gate

<b>ϟ Join <a href='t.me/Karding666'>Channel</a></b>",
    'parse_mode'=>'html',
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>"Return",'callback_data'=>"back"]]
  ],'resize_keyboard'=>true])
  ]);
  }
  
  
  if($data == "othercmds"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>❌❌ Other Commands ❌❌</b>
  
<b>/me | !me</b> - Your Info
<b>/stats | !stats</b> - Checker Stats
<b>/key | !key</b> - SK Key Checker
<b>/bin | !bin</b> - Bin Lookup
<b>/iban | !iban</b> - IBAN Checker

`DONATE A RDP HERE` --->  @ArpitaX
  
  <b>ϟ Join <a href='t.me/Karding666'>CHANNEL</a></b>",
    'parse_mode'=>'html',
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>"Return",'callback_data'=>"back"]]
  ],'resize_keyboard'=>true])
  ]);
  }

?>
