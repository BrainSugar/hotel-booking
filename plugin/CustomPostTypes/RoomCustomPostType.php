<?php

namespace Brainsugar\CustomPostTypes;

use Brainsugar\WPBones\Foundation\WordPressCustomPostTypeServiceProvider as ServiceProvider;

use Brainsugar\Admin\Columns\RoomColumns;
use Brainsugar\Admin\Metaboxes\RoomMetabox;
use Brainsugar\Model\Room;


class RoomCustomPostType extends ServiceProvider
{
  protected $id     = 'bshb_room';
  protected $name   = 'Room';
  protected $plural = 'Rooms';
  protected $public            = true;
  protected $publiclyQueryable = true;
  protected $mapMetaCap        = true;
  protected $menuIcon          = 'dashicons-universal-access-alt';
  protected $showInRest = 'true';
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
        $post_type        = "bshb_room";
        return $post_type;
    }

     
  
    

}

