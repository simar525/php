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

$searchKey = isset($_GET['key']) ? $_GET['key'] : die();
$users->pageNo = isset($_GET['pageno']) ? $_GET['pageno'] : 1;
$users->no_of_records_per_page = isset($_GET['pagesize']) ? $_GET['pagesize'] : 30;

$stmt = $users->search($searchKey);
$num = $stmt->rowCount();
 
if($num>0){
    $users_arr=array();
	$users_arr["pageno"]=$users->pageNo;
	$users_arr["pagesize"]=$users->no_of_records_per_page;
    $users_arr["total_count"]=$users->search_count($searchKey);
    $users_arr["records"]=array();
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $users_item=array(
            
"id" => $id,
"username" => html_entity_decode($username),
"slug" => html_entity_decode($slug),
"email" => html_entity_decode($email),
"email_status" => $email_status,
"token" => html_entity_decode($token),
"password" => html_entity_decode($password),
"role_id" => $role_id,
"has_active_shop" => $has_active_shop,
"balance" => $balance,
"number_of_sales" => $number_of_sales,
"user_type" => $user_type,
"facebook_id" => html_entity_decode($facebook_id),
"google_id" => html_entity_decode($google_id),
"vkontakte_id" => html_entity_decode($vkontakte_id),
"avatar" => html_entity_decode($avatar),
"cover_image" => html_entity_decode($cover_image),
"cover_image_type" => $cover_image_type,
"banned" => $banned,
"first_name" => $first_name,
"last_name" => $last_name,
"shop_name" => html_entity_decode($shop_name),
"about_me" => html_entity_decode($about_me),
"phone_number" => $phone_number,
"country_id" => $country_id,
"state_id" => $state_id,
"city_id" => $city_id,
"address" => html_entity_decode($address),
"zip_code" => $zip_code,
"show_email" => $show_email,
"show_phone" => $show_phone,
"show_location" => $show_location,
"personal_website_url" => html_entity_decode($personal_website_url),
"facebook_url" => html_entity_decode($facebook_url),
"twitter_url" => html_entity_decode($twitter_url),
"instagram_url" => html_entity_decode($instagram_url),
"pinterest_url" => html_entity_decode($pinterest_url),
"linkedin_url" => html_entity_decode($linkedin_url),
"vk_url" => html_entity_decode($vk_url),
"youtube_url" => html_entity_decode($youtube_url),
"whatsapp_url" => html_entity_decode($whatsapp_url),
"telegram_url" => html_entity_decode($telegram_url),
"last_seen" => $last_seen,
"show_rss_feeds" => $show_rss_feeds,
"send_email_new_message" => $send_email_new_message,
"is_active_shop_request" => $is_active_shop_request,
"vendor_documents" => html_entity_decode($vendor_documents),
"is_membership_plan_expired" => $is_membership_plan_expired,
"is_used_free_plan" => $is_used_free_plan,
"created_at" => $created_at
        );
        array_push($users_arr["records"], $users_item);
    }
    http_response_code(200);
	echo json_encode(array("status" => "success", "code" => 1,"message"=> "users found","document"=> $users_arr));
}else{
    http_response_code(404);
	echo json_encode(array("status" => "error", "code" => 0,"message"=> "No users found.","document"=> ""));
}
 


