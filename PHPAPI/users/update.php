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

$data = json_decode(file_get_contents("php://input"));
$users->id = $data->id;

if(true){

$users->username = $data->username;
$users->slug = $data->slug;
$users->email = $data->email;
$users->email_status = $data->email_status;
$users->token = $data->token;
$users->password = $data->password;
$users->role_id = $data->role_id;
$users->has_active_shop = $data->has_active_shop;
$users->balance = $data->balance;
$users->number_of_sales = $data->number_of_sales;
$users->user_type = $data->user_type;
$users->facebook_id = $data->facebook_id;
$users->google_id = $data->google_id;
$users->vkontakte_id = $data->vkontakte_id;
$users->avatar = $data->avatar;
$users->cover_image = $data->cover_image;
$users->cover_image_type = $data->cover_image_type;
$users->banned = $data->banned;
$users->first_name = $data->first_name;
$users->last_name = $data->last_name;
$users->shop_name = $data->shop_name;
$users->about_me = $data->about_me;
$users->phone_number = $data->phone_number;
$users->country_id = $data->country_id;
$users->state_id = $data->state_id;
$users->city_id = $data->city_id;
$users->address = $data->address;
$users->zip_code = $data->zip_code;
$users->show_email = $data->show_email;
$users->show_phone = $data->show_phone;
$users->show_location = $data->show_location;
$users->personal_website_url = $data->personal_website_url;
$users->facebook_url = $data->facebook_url;
$users->twitter_url = $data->twitter_url;
$users->instagram_url = $data->instagram_url;
$users->pinterest_url = $data->pinterest_url;
$users->linkedin_url = $data->linkedin_url;
$users->vk_url = $data->vk_url;
$users->youtube_url = $data->youtube_url;
$users->whatsapp_url = $data->whatsapp_url;
$users->telegram_url = $data->telegram_url;
$users->last_seen = $data->last_seen;
$users->show_rss_feeds = $data->show_rss_feeds;
$users->send_email_new_message = $data->send_email_new_message;
$users->is_active_shop_request = $data->is_active_shop_request;
$users->vendor_documents = $data->vendor_documents;
$users->is_membership_plan_expired = $data->is_membership_plan_expired;
$users->is_used_free_plan = $data->is_used_free_plan;
$users->created_at = $data->created_at;
if($users->update()){
    http_response_code(200);
	echo json_encode(array("status" => "success", "code" => 1,"message"=> "Updated Successfully","document"=> ""));
}
else{
    http_response_code(503);
	echo json_encode(array("status" => "error", "code" => 0,"message"=> "Unable to update users","document"=> ""));
}
}
else{
    http_response_code(400);
	echo json_encode(array("status" => "error", "code" => 0,"message"=> "Unable to update users. Data is incomplete.","document"=> ""));
}
?>
