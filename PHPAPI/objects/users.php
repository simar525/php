<?php
class Users{
 
    private $conn;
    private $table_name = "users";
	public $pageNo = 1;
	public  $no_of_records_per_page=30;
	
public $id;
public $username;
public $slug;
public $email;
public $email_status;
public $token;
public $password;
public $role_id;
public $has_active_shop;
public $balance;
public $number_of_sales;
public $user_type;
public $facebook_id;
public $google_id;
public $vkontakte_id;
public $avatar;
public $cover_image;
public $cover_image_type;
public $banned;
public $first_name;
public $last_name;
public $shop_name;
public $about_me;
public $phone_number;
public $country_id;
public $state_id;
public $city_id;
public $address;
public $zip_code;
public $show_email;
public $show_phone;
public $show_location;
public $personal_website_url;
public $facebook_url;
public $twitter_url;
public $instagram_url;
public $pinterest_url;
public $linkedin_url;
public $vk_url;
public $youtube_url;
public $whatsapp_url;
public $telegram_url;
public $last_seen;
public $show_rss_feeds;
public $send_email_new_message;
public $is_active_shop_request;
public $vendor_documents;
public $is_membership_plan_expired;
public $is_used_free_plan;
public $created_at;
    
    public function __construct($db){
        $this->conn = $db;
    }

	function total_record_count() {
		$query = "select count(1) as total from ". $this->table_name ."";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row['total'];
	}

	function search_count($searchKey) {
		$query = "SELECT count(1) as total FROM ". $this->table_name ." t  WHERE LOWER(t.username) LIKE ? OR LOWER(t.slug) LIKE ?  OR LOWER(t.email) LIKE ?  OR LOWER(t.email_status) LIKE ?  OR LOWER(t.token) LIKE ?  OR LOWER(t.password) LIKE ?  OR LOWER(t.role_id) LIKE ?  OR LOWER(t.has_active_shop) LIKE ?  OR LOWER(t.balance) LIKE ?  OR LOWER(t.number_of_sales) LIKE ?  OR LOWER(t.user_type) LIKE ?  OR LOWER(t.facebook_id) LIKE ?  OR LOWER(t.google_id) LIKE ?  OR LOWER(t.vkontakte_id) LIKE ?  OR LOWER(t.avatar) LIKE ?  OR LOWER(t.cover_image) LIKE ?  OR LOWER(t.cover_image_type) LIKE ?  OR LOWER(t.banned) LIKE ?  OR LOWER(t.first_name) LIKE ?  OR LOWER(t.last_name) LIKE ?  OR LOWER(t.shop_name) LIKE ?  OR LOWER(t.about_me) LIKE ?  OR LOWER(t.phone_number) LIKE ?  OR LOWER(t.country_id) LIKE ?  OR LOWER(t.state_id) LIKE ?  OR LOWER(t.city_id) LIKE ?  OR LOWER(t.address) LIKE ?  OR LOWER(t.zip_code) LIKE ?  OR LOWER(t.show_email) LIKE ?  OR LOWER(t.show_phone) LIKE ?  OR LOWER(t.show_location) LIKE ?  OR LOWER(t.personal_website_url) LIKE ?  OR LOWER(t.facebook_url) LIKE ?  OR LOWER(t.twitter_url) LIKE ?  OR LOWER(t.instagram_url) LIKE ?  OR LOWER(t.pinterest_url) LIKE ?  OR LOWER(t.linkedin_url) LIKE ?  OR LOWER(t.vk_url) LIKE ?  OR LOWER(t.youtube_url) LIKE ?  OR LOWER(t.whatsapp_url) LIKE ?  OR LOWER(t.telegram_url) LIKE ?  OR LOWER(t.last_seen) LIKE ?  OR LOWER(t.show_rss_feeds) LIKE ?  OR LOWER(t.send_email_new_message) LIKE ?  OR LOWER(t.is_active_shop_request) LIKE ?  OR LOWER(t.vendor_documents) LIKE ?  OR LOWER(t.is_membership_plan_expired) LIKE ?  OR LOWER(t.is_used_free_plan) LIKE ?  OR LOWER(t.created_at) LIKE ? ";
		$stmt = $this->conn->prepare($query);
		$searchKey="%".strtolower($searchKey)."%";
		
$stmt->bindParam(1, $searchKey);
$stmt->bindParam(2, $searchKey);
$stmt->bindParam(3, $searchKey);
$stmt->bindParam(4, $searchKey);
$stmt->bindParam(5, $searchKey);
$stmt->bindParam(6, $searchKey);
$stmt->bindParam(7, $searchKey);
$stmt->bindParam(8, $searchKey);
$stmt->bindParam(9, $searchKey);
$stmt->bindParam(10, $searchKey);
$stmt->bindParam(11, $searchKey);
$stmt->bindParam(12, $searchKey);
$stmt->bindParam(13, $searchKey);
$stmt->bindParam(14, $searchKey);
$stmt->bindParam(15, $searchKey);
$stmt->bindParam(16, $searchKey);
$stmt->bindParam(17, $searchKey);
$stmt->bindParam(18, $searchKey);
$stmt->bindParam(19, $searchKey);
$stmt->bindParam(20, $searchKey);
$stmt->bindParam(21, $searchKey);
$stmt->bindParam(22, $searchKey);
$stmt->bindParam(23, $searchKey);
$stmt->bindParam(24, $searchKey);
$stmt->bindParam(25, $searchKey);
$stmt->bindParam(26, $searchKey);
$stmt->bindParam(27, $searchKey);
$stmt->bindParam(28, $searchKey);
$stmt->bindParam(29, $searchKey);
$stmt->bindParam(30, $searchKey);
$stmt->bindParam(31, $searchKey);
$stmt->bindParam(32, $searchKey);
$stmt->bindParam(33, $searchKey);
$stmt->bindParam(34, $searchKey);
$stmt->bindParam(35, $searchKey);
$stmt->bindParam(36, $searchKey);
$stmt->bindParam(37, $searchKey);
$stmt->bindParam(38, $searchKey);
$stmt->bindParam(39, $searchKey);
$stmt->bindParam(40, $searchKey);
$stmt->bindParam(41, $searchKey);
$stmt->bindParam(42, $searchKey);
$stmt->bindParam(43, $searchKey);
$stmt->bindParam(44, $searchKey);
$stmt->bindParam(45, $searchKey);
$stmt->bindParam(46, $searchKey);
$stmt->bindParam(47, $searchKey);
$stmt->bindParam(48, $searchKey);
$stmt->bindParam(49, $searchKey);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row['total'];
	}
	
	function search_record_count($columnArray,$orAnd){
		$where="";
		$paramCount = 1;
		foreach ($columnArray as $col) {
			$pre_param = "P" . $paramCount . "_";
			$columnName=htmlspecialchars(strip_tags($col->columnName));
			$columnLogic=$col->columnLogic;
			if($where==""){
				$where="LOWER(t.".$columnName . ") ".$columnLogic." :".$pre_param.$columnName;
			}else{
				$where=$where." ". $orAnd ." LOWER(t." . $columnName . ") ".$columnLogic." :".$pre_param.$columnName;
			}
			 $paramCount++;
		}
		$query = "SELECT count(1) as total FROM ". $this->table_name ." t  WHERE ".$where."";
		
		$stmt = $this->conn->prepare($query);
		$paramCount=1;
		foreach ($columnArray as $col) {
			$pre_param = "P" . $paramCount . "_";
			$columnName=htmlspecialchars(strip_tags($col->columnName));
		if(strtoupper($col->columnLogic)=="LIKE"){
		$columnValue="%".strtolower($col->columnValue)."%";
		}else{
		$columnValue=strtolower($col->columnValue);
		}
			$stmt->bindValue(":".$pre_param.$columnName, $columnValue);
			$paramCount++;
		}
		
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		 $num = $stmt->rowCount();
		if($num>0){
			return $row['total'];
		}else{
			return 0;
		}
	}
	function read(){
		if(isset($_GET["pageNo"])){
			$this->pageNo=$_GET["pageNo"];
		}
		$offset = ($this->pageNo-1) * $this->no_of_records_per_page; 
		$query = "SELECT  t.* FROM ". $this->table_name ." t  LIMIT ".$offset." , ". $this->no_of_records_per_page."";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	function search($searchKey){
		if(isset($_GET["pageNo"])){
		$this->pageNo=$_GET["pageNo"];
		}
		$offset = ($this->pageNo-1) * $this->no_of_records_per_page; 
		$query = "SELECT  t.* FROM ". $this->table_name ." t  WHERE LOWER(t.username) LIKE ? OR LOWER(t.slug) LIKE ?  OR LOWER(t.email) LIKE ?  OR LOWER(t.email_status) LIKE ?  OR LOWER(t.token) LIKE ?  OR LOWER(t.password) LIKE ?  OR LOWER(t.role_id) LIKE ?  OR LOWER(t.has_active_shop) LIKE ?  OR LOWER(t.balance) LIKE ?  OR LOWER(t.number_of_sales) LIKE ?  OR LOWER(t.user_type) LIKE ?  OR LOWER(t.facebook_id) LIKE ?  OR LOWER(t.google_id) LIKE ?  OR LOWER(t.vkontakte_id) LIKE ?  OR LOWER(t.avatar) LIKE ?  OR LOWER(t.cover_image) LIKE ?  OR LOWER(t.cover_image_type) LIKE ?  OR LOWER(t.banned) LIKE ?  OR LOWER(t.first_name) LIKE ?  OR LOWER(t.last_name) LIKE ?  OR LOWER(t.shop_name) LIKE ?  OR LOWER(t.about_me) LIKE ?  OR LOWER(t.phone_number) LIKE ?  OR LOWER(t.country_id) LIKE ?  OR LOWER(t.state_id) LIKE ?  OR LOWER(t.city_id) LIKE ?  OR LOWER(t.address) LIKE ?  OR LOWER(t.zip_code) LIKE ?  OR LOWER(t.show_email) LIKE ?  OR LOWER(t.show_phone) LIKE ?  OR LOWER(t.show_location) LIKE ?  OR LOWER(t.personal_website_url) LIKE ?  OR LOWER(t.facebook_url) LIKE ?  OR LOWER(t.twitter_url) LIKE ?  OR LOWER(t.instagram_url) LIKE ?  OR LOWER(t.pinterest_url) LIKE ?  OR LOWER(t.linkedin_url) LIKE ?  OR LOWER(t.vk_url) LIKE ?  OR LOWER(t.youtube_url) LIKE ?  OR LOWER(t.whatsapp_url) LIKE ?  OR LOWER(t.telegram_url) LIKE ?  OR LOWER(t.last_seen) LIKE ?  OR LOWER(t.show_rss_feeds) LIKE ?  OR LOWER(t.send_email_new_message) LIKE ?  OR LOWER(t.is_active_shop_request) LIKE ?  OR LOWER(t.vendor_documents) LIKE ?  OR LOWER(t.is_membership_plan_expired) LIKE ?  OR LOWER(t.is_used_free_plan) LIKE ?  OR LOWER(t.created_at) LIKE ?  LIMIT ".$offset." , ". $this->no_of_records_per_page."";
		$stmt = $this->conn->prepare($query);
		$searchKey="%".strtolower($searchKey)."%";
		
$stmt->bindParam(1, $searchKey);
$stmt->bindParam(2, $searchKey);
$stmt->bindParam(3, $searchKey);
$stmt->bindParam(4, $searchKey);
$stmt->bindParam(5, $searchKey);
$stmt->bindParam(6, $searchKey);
$stmt->bindParam(7, $searchKey);
$stmt->bindParam(8, $searchKey);
$stmt->bindParam(9, $searchKey);
$stmt->bindParam(10, $searchKey);
$stmt->bindParam(11, $searchKey);
$stmt->bindParam(12, $searchKey);
$stmt->bindParam(13, $searchKey);
$stmt->bindParam(14, $searchKey);
$stmt->bindParam(15, $searchKey);
$stmt->bindParam(16, $searchKey);
$stmt->bindParam(17, $searchKey);
$stmt->bindParam(18, $searchKey);
$stmt->bindParam(19, $searchKey);
$stmt->bindParam(20, $searchKey);
$stmt->bindParam(21, $searchKey);
$stmt->bindParam(22, $searchKey);
$stmt->bindParam(23, $searchKey);
$stmt->bindParam(24, $searchKey);
$stmt->bindParam(25, $searchKey);
$stmt->bindParam(26, $searchKey);
$stmt->bindParam(27, $searchKey);
$stmt->bindParam(28, $searchKey);
$stmt->bindParam(29, $searchKey);
$stmt->bindParam(30, $searchKey);
$stmt->bindParam(31, $searchKey);
$stmt->bindParam(32, $searchKey);
$stmt->bindParam(33, $searchKey);
$stmt->bindParam(34, $searchKey);
$stmt->bindParam(35, $searchKey);
$stmt->bindParam(36, $searchKey);
$stmt->bindParam(37, $searchKey);
$stmt->bindParam(38, $searchKey);
$stmt->bindParam(39, $searchKey);
$stmt->bindParam(40, $searchKey);
$stmt->bindParam(41, $searchKey);
$stmt->bindParam(42, $searchKey);
$stmt->bindParam(43, $searchKey);
$stmt->bindParam(44, $searchKey);
$stmt->bindParam(45, $searchKey);
$stmt->bindParam(46, $searchKey);
$stmt->bindParam(47, $searchKey);
$stmt->bindParam(48, $searchKey);
$stmt->bindParam(49, $searchKey);
		$stmt->execute();
		return $stmt;
	}
	function searchByColumn($columnArray,$orAnd){
		if(isset($_GET["pageNo"])){
		$this->pageNo=$_GET["pageNo"];
		}
		$offset = ($this->pageNo-1) * $this->no_of_records_per_page; 
		$where="";
		$paramCount = 1;
		foreach ($columnArray as $col) {
			$pre_param = "P" . $paramCount . "_";
			$columnName=htmlspecialchars(strip_tags($col->columnName));
			$columnLogic=$col->columnLogic;
			if($where==""){
				$where="LOWER(t.".$columnName . ") ".$columnLogic." :".$pre_param.$columnName;
			}else{
				$where=$where." ". $orAnd ." LOWER(t." . $columnName . ") ".$columnLogic." :".$pre_param.$columnName;
			}
			 $paramCount++;
		}
		$query = "SELECT  t.* FROM ". $this->table_name ." t  WHERE ".$where." LIMIT ".$offset." , ". $this->no_of_records_per_page."";
		
		$stmt = $this->conn->prepare($query);
		$paramCount=1;
		foreach ($columnArray as $col) {
			$pre_param = "P" . $paramCount . "_";
			$columnName=htmlspecialchars(strip_tags($col->columnName));
			if(strtoupper($col->columnLogic)=="LIKE"){
			$columnValue="%".strtolower($col->columnValue)."%";
			}else{
			$columnValue=strtolower($col->columnValue);
			}
			$stmt->bindValue(":".$pre_param.$columnName, $columnValue);
			$paramCount++;
		}
		
		$stmt->execute();
		return $stmt;
	}
	
	

	function readOne(){
		$query = "SELECT  t.* FROM ". $this->table_name ." t  WHERE t.id = ? LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$num = $stmt->rowCount();
		if($num>0){
			
$this->id = $row['id'];
$this->username = $row['username'];
$this->slug = $row['slug'];
$this->email = $row['email'];
$this->email_status = $row['email_status'];
$this->token = $row['token'];
$this->password = $row['password'];
$this->role_id = $row['role_id'];
$this->has_active_shop = $row['has_active_shop'];
$this->balance = $row['balance'];
$this->number_of_sales = $row['number_of_sales'];
$this->user_type = $row['user_type'];
$this->facebook_id = $row['facebook_id'];
$this->google_id = $row['google_id'];
$this->vkontakte_id = $row['vkontakte_id'];
$this->avatar = $row['avatar'];
$this->cover_image = $row['cover_image'];
$this->cover_image_type = $row['cover_image_type'];
$this->banned = $row['banned'];
$this->first_name = $row['first_name'];
$this->last_name = $row['last_name'];
$this->shop_name = $row['shop_name'];
$this->about_me = $row['about_me'];
$this->phone_number = $row['phone_number'];
$this->country_id = $row['country_id'];
$this->state_id = $row['state_id'];
$this->city_id = $row['city_id'];
$this->address = $row['address'];
$this->zip_code = $row['zip_code'];
$this->show_email = $row['show_email'];
$this->show_phone = $row['show_phone'];
$this->show_location = $row['show_location'];
$this->personal_website_url = $row['personal_website_url'];
$this->facebook_url = $row['facebook_url'];
$this->twitter_url = $row['twitter_url'];
$this->instagram_url = $row['instagram_url'];
$this->pinterest_url = $row['pinterest_url'];
$this->linkedin_url = $row['linkedin_url'];
$this->vk_url = $row['vk_url'];
$this->youtube_url = $row['youtube_url'];
$this->whatsapp_url = $row['whatsapp_url'];
$this->telegram_url = $row['telegram_url'];
$this->last_seen = $row['last_seen'];
$this->show_rss_feeds = $row['show_rss_feeds'];
$this->send_email_new_message = $row['send_email_new_message'];
$this->is_active_shop_request = $row['is_active_shop_request'];
$this->vendor_documents = $row['vendor_documents'];
$this->is_membership_plan_expired = $row['is_membership_plan_expired'];
$this->is_used_free_plan = $row['is_used_free_plan'];
$this->created_at = $row['created_at'];
		}
		else{
			$this->id=null;
		}
	}
	function create(){
		$query ="INSERT INTO ".$this->table_name." SET username=:username,slug=:slug,email=:email,email_status=:email_status,token=:token,password=:password,role_id=:role_id,has_active_shop=:has_active_shop,balance=:balance,number_of_sales=:number_of_sales,user_type=:user_type,facebook_id=:facebook_id,google_id=:google_id,vkontakte_id=:vkontakte_id,avatar=:avatar,cover_image=:cover_image,cover_image_type=:cover_image_type,banned=:banned,first_name=:first_name,last_name=:last_name,shop_name=:shop_name,about_me=:about_me,phone_number=:phone_number,country_id=:country_id,state_id=:state_id,city_id=:city_id,address=:address,zip_code=:zip_code,show_email=:show_email,show_phone=:show_phone,show_location=:show_location,personal_website_url=:personal_website_url,facebook_url=:facebook_url,twitter_url=:twitter_url,instagram_url=:instagram_url,pinterest_url=:pinterest_url,linkedin_url=:linkedin_url,vk_url=:vk_url,youtube_url=:youtube_url,whatsapp_url=:whatsapp_url,telegram_url=:telegram_url,last_seen=:last_seen,show_rss_feeds=:show_rss_feeds,send_email_new_message=:send_email_new_message,is_active_shop_request=:is_active_shop_request,vendor_documents=:vendor_documents,is_membership_plan_expired=:is_membership_plan_expired,is_used_free_plan=:is_used_free_plan,created_at=:created_at";
		$stmt = $this->conn->prepare($query);
		
$this->username=htmlspecialchars(strip_tags($this->username));
$this->slug=htmlspecialchars(strip_tags($this->slug));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->email_status=htmlspecialchars(strip_tags($this->email_status));
$this->token=htmlspecialchars(strip_tags($this->token));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->role_id=htmlspecialchars(strip_tags($this->role_id));
$this->has_active_shop=htmlspecialchars(strip_tags($this->has_active_shop));
$this->balance=htmlspecialchars(strip_tags($this->balance));
$this->number_of_sales=htmlspecialchars(strip_tags($this->number_of_sales));
$this->user_type=htmlspecialchars(strip_tags($this->user_type));
$this->facebook_id=htmlspecialchars(strip_tags($this->facebook_id));
$this->google_id=htmlspecialchars(strip_tags($this->google_id));
$this->vkontakte_id=htmlspecialchars(strip_tags($this->vkontakte_id));
$this->avatar=htmlspecialchars(strip_tags($this->avatar));
$this->cover_image=htmlspecialchars(strip_tags($this->cover_image));
$this->cover_image_type=htmlspecialchars(strip_tags($this->cover_image_type));
$this->banned=htmlspecialchars(strip_tags($this->banned));
$this->first_name=htmlspecialchars(strip_tags($this->first_name));
$this->last_name=htmlspecialchars(strip_tags($this->last_name));
$this->shop_name=htmlspecialchars(strip_tags($this->shop_name));
$this->about_me=htmlspecialchars(strip_tags($this->about_me));
$this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
$this->country_id=htmlspecialchars(strip_tags($this->country_id));
$this->state_id=htmlspecialchars(strip_tags($this->state_id));
$this->city_id=htmlspecialchars(strip_tags($this->city_id));
$this->address=htmlspecialchars(strip_tags($this->address));
$this->zip_code=htmlspecialchars(strip_tags($this->zip_code));
$this->show_email=htmlspecialchars(strip_tags($this->show_email));
$this->show_phone=htmlspecialchars(strip_tags($this->show_phone));
$this->show_location=htmlspecialchars(strip_tags($this->show_location));
$this->personal_website_url=htmlspecialchars(strip_tags($this->personal_website_url));
$this->facebook_url=htmlspecialchars(strip_tags($this->facebook_url));
$this->twitter_url=htmlspecialchars(strip_tags($this->twitter_url));
$this->instagram_url=htmlspecialchars(strip_tags($this->instagram_url));
$this->pinterest_url=htmlspecialchars(strip_tags($this->pinterest_url));
$this->linkedin_url=htmlspecialchars(strip_tags($this->linkedin_url));
$this->vk_url=htmlspecialchars(strip_tags($this->vk_url));
$this->youtube_url=htmlspecialchars(strip_tags($this->youtube_url));
$this->whatsapp_url=htmlspecialchars(strip_tags($this->whatsapp_url));
$this->telegram_url=htmlspecialchars(strip_tags($this->telegram_url));
$this->last_seen=htmlspecialchars(strip_tags($this->last_seen));
$this->show_rss_feeds=htmlspecialchars(strip_tags($this->show_rss_feeds));
$this->send_email_new_message=htmlspecialchars(strip_tags($this->send_email_new_message));
$this->is_active_shop_request=htmlspecialchars(strip_tags($this->is_active_shop_request));
$this->vendor_documents=htmlspecialchars(strip_tags($this->vendor_documents));
$this->is_membership_plan_expired=htmlspecialchars(strip_tags($this->is_membership_plan_expired));
$this->is_used_free_plan=htmlspecialchars(strip_tags($this->is_used_free_plan));
$this->created_at=htmlspecialchars(strip_tags($this->created_at));
		
$stmt->bindParam(":username", $this->username);
$stmt->bindParam(":slug", $this->slug);
$stmt->bindParam(":email", $this->email);
$stmt->bindParam(":email_status", $this->email_status);
$stmt->bindParam(":token", $this->token);
$stmt->bindParam(":password", $this->password);
$stmt->bindParam(":role_id", $this->role_id);
$stmt->bindParam(":has_active_shop", $this->has_active_shop);
$stmt->bindParam(":balance", $this->balance);
$stmt->bindParam(":number_of_sales", $this->number_of_sales);
$stmt->bindParam(":user_type", $this->user_type);
$stmt->bindParam(":facebook_id", $this->facebook_id);
$stmt->bindParam(":google_id", $this->google_id);
$stmt->bindParam(":vkontakte_id", $this->vkontakte_id);
$stmt->bindParam(":avatar", $this->avatar);
$stmt->bindParam(":cover_image", $this->cover_image);
$stmt->bindParam(":cover_image_type", $this->cover_image_type);
$stmt->bindParam(":banned", $this->banned);
$stmt->bindParam(":first_name", $this->first_name);
$stmt->bindParam(":last_name", $this->last_name);
$stmt->bindParam(":shop_name", $this->shop_name);
$stmt->bindParam(":about_me", $this->about_me);
$stmt->bindParam(":phone_number", $this->phone_number);
$stmt->bindParam(":country_id", $this->country_id);
$stmt->bindParam(":state_id", $this->state_id);
$stmt->bindParam(":city_id", $this->city_id);
$stmt->bindParam(":address", $this->address);
$stmt->bindParam(":zip_code", $this->zip_code);
$stmt->bindParam(":show_email", $this->show_email);
$stmt->bindParam(":show_phone", $this->show_phone);
$stmt->bindParam(":show_location", $this->show_location);
$stmt->bindParam(":personal_website_url", $this->personal_website_url);
$stmt->bindParam(":facebook_url", $this->facebook_url);
$stmt->bindParam(":twitter_url", $this->twitter_url);
$stmt->bindParam(":instagram_url", $this->instagram_url);
$stmt->bindParam(":pinterest_url", $this->pinterest_url);
$stmt->bindParam(":linkedin_url", $this->linkedin_url);
$stmt->bindParam(":vk_url", $this->vk_url);
$stmt->bindParam(":youtube_url", $this->youtube_url);
$stmt->bindParam(":whatsapp_url", $this->whatsapp_url);
$stmt->bindParam(":telegram_url", $this->telegram_url);
$stmt->bindParam(":last_seen", $this->last_seen);
$stmt->bindParam(":show_rss_feeds", $this->show_rss_feeds);
$stmt->bindParam(":send_email_new_message", $this->send_email_new_message);
$stmt->bindParam(":is_active_shop_request", $this->is_active_shop_request);
$stmt->bindParam(":vendor_documents", $this->vendor_documents);
$stmt->bindParam(":is_membership_plan_expired", $this->is_membership_plan_expired);
$stmt->bindParam(":is_used_free_plan", $this->is_used_free_plan);
$stmt->bindParam(":created_at", $this->created_at);
		$lastInsertedId=0;
		if($stmt->execute()){
			$lastInsertedId = $this->conn->lastInsertId();
			if($lastInsertedId==0 && $this->id!=null){
				$this->readOne();
				if($this->id!=null){
					$lastInsertedId=$this->id;
					}
			}
		}
	
		return $lastInsertedId;
	}
	function update(){
		$query ="UPDATE ".$this->table_name." SET username=:username,slug=:slug,email=:email,email_status=:email_status,token=:token,password=:password,role_id=:role_id,has_active_shop=:has_active_shop,balance=:balance,number_of_sales=:number_of_sales,user_type=:user_type,facebook_id=:facebook_id,google_id=:google_id,vkontakte_id=:vkontakte_id,avatar=:avatar,cover_image=:cover_image,cover_image_type=:cover_image_type,banned=:banned,first_name=:first_name,last_name=:last_name,shop_name=:shop_name,about_me=:about_me,phone_number=:phone_number,country_id=:country_id,state_id=:state_id,city_id=:city_id,address=:address,zip_code=:zip_code,show_email=:show_email,show_phone=:show_phone,show_location=:show_location,personal_website_url=:personal_website_url,facebook_url=:facebook_url,twitter_url=:twitter_url,instagram_url=:instagram_url,pinterest_url=:pinterest_url,linkedin_url=:linkedin_url,vk_url=:vk_url,youtube_url=:youtube_url,whatsapp_url=:whatsapp_url,telegram_url=:telegram_url,last_seen=:last_seen,show_rss_feeds=:show_rss_feeds,send_email_new_message=:send_email_new_message,is_active_shop_request=:is_active_shop_request,vendor_documents=:vendor_documents,is_membership_plan_expired=:is_membership_plan_expired,is_used_free_plan=:is_used_free_plan,created_at=:created_at WHERE id = :id";
		$stmt = $this->conn->prepare($query);
		
$this->username=htmlspecialchars(strip_tags($this->username));
$this->slug=htmlspecialchars(strip_tags($this->slug));
$this->email=htmlspecialchars(strip_tags($this->email));
$this->email_status=htmlspecialchars(strip_tags($this->email_status));
$this->token=htmlspecialchars(strip_tags($this->token));
$this->password=htmlspecialchars(strip_tags($this->password));
$this->role_id=htmlspecialchars(strip_tags($this->role_id));
$this->has_active_shop=htmlspecialchars(strip_tags($this->has_active_shop));
$this->balance=htmlspecialchars(strip_tags($this->balance));
$this->number_of_sales=htmlspecialchars(strip_tags($this->number_of_sales));
$this->user_type=htmlspecialchars(strip_tags($this->user_type));
$this->facebook_id=htmlspecialchars(strip_tags($this->facebook_id));
$this->google_id=htmlspecialchars(strip_tags($this->google_id));
$this->vkontakte_id=htmlspecialchars(strip_tags($this->vkontakte_id));
$this->avatar=htmlspecialchars(strip_tags($this->avatar));
$this->cover_image=htmlspecialchars(strip_tags($this->cover_image));
$this->cover_image_type=htmlspecialchars(strip_tags($this->cover_image_type));
$this->banned=htmlspecialchars(strip_tags($this->banned));
$this->first_name=htmlspecialchars(strip_tags($this->first_name));
$this->last_name=htmlspecialchars(strip_tags($this->last_name));
$this->shop_name=htmlspecialchars(strip_tags($this->shop_name));
$this->about_me=htmlspecialchars(strip_tags($this->about_me));
$this->phone_number=htmlspecialchars(strip_tags($this->phone_number));
$this->country_id=htmlspecialchars(strip_tags($this->country_id));
$this->state_id=htmlspecialchars(strip_tags($this->state_id));
$this->city_id=htmlspecialchars(strip_tags($this->city_id));
$this->address=htmlspecialchars(strip_tags($this->address));
$this->zip_code=htmlspecialchars(strip_tags($this->zip_code));
$this->show_email=htmlspecialchars(strip_tags($this->show_email));
$this->show_phone=htmlspecialchars(strip_tags($this->show_phone));
$this->show_location=htmlspecialchars(strip_tags($this->show_location));
$this->personal_website_url=htmlspecialchars(strip_tags($this->personal_website_url));
$this->facebook_url=htmlspecialchars(strip_tags($this->facebook_url));
$this->twitter_url=htmlspecialchars(strip_tags($this->twitter_url));
$this->instagram_url=htmlspecialchars(strip_tags($this->instagram_url));
$this->pinterest_url=htmlspecialchars(strip_tags($this->pinterest_url));
$this->linkedin_url=htmlspecialchars(strip_tags($this->linkedin_url));
$this->vk_url=htmlspecialchars(strip_tags($this->vk_url));
$this->youtube_url=htmlspecialchars(strip_tags($this->youtube_url));
$this->whatsapp_url=htmlspecialchars(strip_tags($this->whatsapp_url));
$this->telegram_url=htmlspecialchars(strip_tags($this->telegram_url));
$this->last_seen=htmlspecialchars(strip_tags($this->last_seen));
$this->show_rss_feeds=htmlspecialchars(strip_tags($this->show_rss_feeds));
$this->send_email_new_message=htmlspecialchars(strip_tags($this->send_email_new_message));
$this->is_active_shop_request=htmlspecialchars(strip_tags($this->is_active_shop_request));
$this->vendor_documents=htmlspecialchars(strip_tags($this->vendor_documents));
$this->is_membership_plan_expired=htmlspecialchars(strip_tags($this->is_membership_plan_expired));
$this->is_used_free_plan=htmlspecialchars(strip_tags($this->is_used_free_plan));
$this->created_at=htmlspecialchars(strip_tags($this->created_at));
$this->id=htmlspecialchars(strip_tags($this->id));
		
$stmt->bindParam(":username", $this->username);
$stmt->bindParam(":slug", $this->slug);
$stmt->bindParam(":email", $this->email);
$stmt->bindParam(":email_status", $this->email_status);
$stmt->bindParam(":token", $this->token);
$stmt->bindParam(":password", $this->password);
$stmt->bindParam(":role_id", $this->role_id);
$stmt->bindParam(":has_active_shop", $this->has_active_shop);
$stmt->bindParam(":balance", $this->balance);
$stmt->bindParam(":number_of_sales", $this->number_of_sales);
$stmt->bindParam(":user_type", $this->user_type);
$stmt->bindParam(":facebook_id", $this->facebook_id);
$stmt->bindParam(":google_id", $this->google_id);
$stmt->bindParam(":vkontakte_id", $this->vkontakte_id);
$stmt->bindParam(":avatar", $this->avatar);
$stmt->bindParam(":cover_image", $this->cover_image);
$stmt->bindParam(":cover_image_type", $this->cover_image_type);
$stmt->bindParam(":banned", $this->banned);
$stmt->bindParam(":first_name", $this->first_name);
$stmt->bindParam(":last_name", $this->last_name);
$stmt->bindParam(":shop_name", $this->shop_name);
$stmt->bindParam(":about_me", $this->about_me);
$stmt->bindParam(":phone_number", $this->phone_number);
$stmt->bindParam(":country_id", $this->country_id);
$stmt->bindParam(":state_id", $this->state_id);
$stmt->bindParam(":city_id", $this->city_id);
$stmt->bindParam(":address", $this->address);
$stmt->bindParam(":zip_code", $this->zip_code);
$stmt->bindParam(":show_email", $this->show_email);
$stmt->bindParam(":show_phone", $this->show_phone);
$stmt->bindParam(":show_location", $this->show_location);
$stmt->bindParam(":personal_website_url", $this->personal_website_url);
$stmt->bindParam(":facebook_url", $this->facebook_url);
$stmt->bindParam(":twitter_url", $this->twitter_url);
$stmt->bindParam(":instagram_url", $this->instagram_url);
$stmt->bindParam(":pinterest_url", $this->pinterest_url);
$stmt->bindParam(":linkedin_url", $this->linkedin_url);
$stmt->bindParam(":vk_url", $this->vk_url);
$stmt->bindParam(":youtube_url", $this->youtube_url);
$stmt->bindParam(":whatsapp_url", $this->whatsapp_url);
$stmt->bindParam(":telegram_url", $this->telegram_url);
$stmt->bindParam(":last_seen", $this->last_seen);
$stmt->bindParam(":show_rss_feeds", $this->show_rss_feeds);
$stmt->bindParam(":send_email_new_message", $this->send_email_new_message);
$stmt->bindParam(":is_active_shop_request", $this->is_active_shop_request);
$stmt->bindParam(":vendor_documents", $this->vendor_documents);
$stmt->bindParam(":is_membership_plan_expired", $this->is_membership_plan_expired);
$stmt->bindParam(":is_used_free_plan", $this->is_used_free_plan);
$stmt->bindParam(":created_at", $this->created_at);
$stmt->bindParam(":id", $this->id);
		$stmt->execute();

	 if($stmt->rowCount()) {
			return true;
		} else {
		   return false;
		}
	}
	function update_patch($jsonObj) {
			$query ="UPDATE ".$this->table_name. " SET ";
			$setValue="";
			$colCount=1;
			foreach($jsonObj as $key => $value) 
			{
				$columnName=htmlspecialchars(strip_tags($key));
				if($columnName!='id'){
				if($colCount===1){
					$setValue = $columnName."=:".$columnName;
				}else{
					$setValue = $setValue . "," .$columnName."=:".$columnName;
				}
				$colCount++;
				}
			}
			$setValue = rtrim($setValue,',');
			$query = $query . " " . $setValue . " WHERE id = :id"; 
			$stmt = $this->conn->prepare($query);
			foreach($jsonObj as $key => $value) 
			{
			    $columnName=htmlspecialchars(strip_tags($key));
				if($columnName!='id'){
				$colValue=htmlspecialchars(strip_tags($value));
				$stmt->bindValue(":".$columnName, $colValue);
				}
			}
			$stmt->bindParam(":id", $this->id);
			$stmt->execute();

			if($stmt->rowCount()) {
				return true;
			} else {
				return false;
			}
	}
	function delete(){
		$query = "DELETE FROM " . $this->table_name . " WHERE id = ? ";
		$stmt = $this->conn->prepare($query);
		$this->id=htmlspecialchars(strip_tags($this->id));

		$stmt->bindParam(1, $this->id);

	 	$stmt->execute();

	 if($stmt->rowCount()) {
			return true;
		} else {
		   return false;
		}
		 
	}

	
}
?>
