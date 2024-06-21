<?php
include_once '../config/header.php';
include_once '../config/helper.php';
include_once '../config/database.php';
include_once '../objects/users.php';
include_once '../token/validatetoken.php';

if (isset($decodedJWTData) && isset($decodedJWTData->tenant))
{
$database = new Database($decodedJWTData->tenant); 
}
else 
{
$database = new Database(); 
}

$db = $database->getConnection();

$users = new Users($db);

$users->id = isset($_GET['id']) ? $_GET['id'] : die();
$users->readOne();
 
if($users->id!=null){
    $users_arr = array(
        
"id" => $users->id,
"username" => html_entity_decode($users->username),
"slug" => html_entity_decode($users->slug),
"email" => html_entity_decode($users->email),
"email_status" => $users->email_status,
"token" => html_entity_decode($users->token),
"password" => html_entity_decode($users->password),
"role_id" => $users->role_id,
"has_active_shop" => $users->has_active_shop,
"balance" => $users->balance,
"number_of_sales" => $users->number_of_sales,
"user_type" => $users->user_type,
"facebook_id" => html_entity_decode($users->facebook_id),
"google_id" => html_entity_decode($users->google_id),
"vkontakte_id" => html_entity_decode($users->vkontakte_id),
"avatar" => html_entity_decode($users->avatar),
"cover_image" => html_entity_decode($users->cover_image),
"cover_image_type" => $users->cover_image_type,
"banned" => $users->banned,
"first_name" => $users->first_name,
"last_name" => $users->last_name,
"shop_name" => html_entity_decode($users->shop_name),
"about_me" => html_entity_decode($users->about_me),
"phone_number" => $users->phone_number,
"country_id" => $users->country_id,
"state_id" => $users->state_id,
"city_id" => $users->city_id,
"address" => html_entity_decode($users->address),
"zip_code" => $users->zip_code,
"show_email" => $users->show_email,
"show_phone" => $users->show_phone,
"show_location" => $users->show_location,
"personal_website_url" => html_entity_decode($users->personal_website_url),
"facebook_url" => html_entity_decode($users->facebook_url),
"twitter_url" => html_entity_decode($users->twitter_url),
"instagram_url" => html_entity_decode($users->instagram_url),
"pinterest_url" => html_entity_decode($users->pinterest_url),
"linkedin_url" => html_entity_decode($users->linkedin_url),
"vk_url" => html_entity_decode($users->vk_url),
"youtube_url" => html_entity_decode($users->youtube_url),
"whatsapp_url" => html_entity_decode($users->whatsapp_url),
"telegram_url" => html_entity_decode($users->telegram_url),
"last_seen" => $users->last_seen,
"show_rss_feeds" => $users->show_rss_feeds,
"send_email_new_message" => $users->send_email_new_message,
"is_active_shop_request" => $users->is_active_shop_request,
"vendor_documents" => html_entity_decode($users->vendor_documents),
"is_membership_plan_expired" => $users->is_membership_plan_expired,
"is_used_free_plan" => $users->is_used_free_plan,
"created_at" => $users->created_at
    );
    http_response_code(200);
   echo json_encode(array("status" => "success", "code" => 1,"message"=> "users found","document"=> $users_arr));
}
else{
    http_response_code(404);
	echo json_encode(array("status" => "error", "code" => 0,"message"=> "users does not exist.","document"=> ""));
}
?>
