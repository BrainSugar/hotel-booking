<?php

namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;

use Brainsugar\Admin\Columns\RoomColumns;
use Brainsugar\Admin\Metaboxes\RoomMetabox;
use Brainsugar\Repositories\RoomRepository;


class RoomCustomPostType extends ServiceProvider
{
  protected $id     = 'bshb_room';
  protected $name   = 'Room';
  protected $plural = 'Rooms';
  protected $public            = true;
  protected $publiclyQueryable = true;
  protected $mapMetaCap        = true;
  protected $menuIcon          = 'dashicons-universal-access-alt';
  protected $showInRest = false;
  protected $rewrite           = [
    'slug'       => 'room_type',   
    'with_front' => true,
    'pages'      => true,
    'ep_mask'    => EP_PERMALINK,
    'description' => "Create a type of room which suits your hotel room.",
  ];

  /**
   * You may override this method in order to register your own actions and filters.
   *
   */
  public function boot()
  { 

        add_action('trash_bshb_room', array($this , 'trashRoomType'), 10 , 2);
        add_action('publish_bshb_room', array($this , 'restoreRoomType') , 10 , 2);
        add_action('before_delete_post', array($this , 'deleteRoomType') , 10 , 2);

               
        $setRoomColumns = new RoomColumns;
        $registerRoomMetabox = new RoomMetabox;

        $setRoomColumns->addActionsAndFilters();
        $registerRoomMetabox->addActionsAndFilters();

  }



  /**
   * Override this method to save/update your custom data.
   * This method is called by hook action save_post_{post_type}`
   *
   * @param int|string $post_id Post ID
   * @param object     $post    Optional. Post object
   *
   */
  public function update( $post_id, $post )
  {
       

}


public function trashRoomType() {
        global $post;
        $room = new RoomRepository;

         if($post->post_type === $this->id) {                
                 $room->trashRoomType($post->ID);
         }
}

public function deleteRoomType() {
        global $post;
        $room = new RoomRepository;
       
        if($post->post_type === $this->id) :
                $room->deleteRoomType($post->ID);
        endif;
}

public function restoreRoomType() {
        global $post;
        $room = new RoomRepository;
       
        if($post->post_type === $this->id) :
                $room->restoreRoomType($post->ID);
        endif;

}





  public function supports()
  {
           return [
        'title',       
        'author',
        'editor',
        'thumbnail',        
        'revisions',        
      ];
  }

      public static function getPostType(){
        $response  = "bshb_room";
        return $response;
    }

}

