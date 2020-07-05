<?php
function add_custom_roles() {    
        add_role( 'event_manager', 'Event Manager', 
                    array( 
                        'read' => true,
                        'publish_events'=> true,
                        'edit_events' => true,
                        'delete_events'=> true,
                        'upload_files' => true                         
                    )
                );  
                
               //remove_role('event_manager');
    
}
add_action( 'init', 'add_custom_roles' );



function event_add_role_caps() {  

$role = get_role('event_manager');

        $role->add_cap( 'read' );
        $role->add_cap( 'read_events');       
        $role->add_cap( 'edit_events' );           
        $role->add_cap( 'edit_published_events' );
        $role->add_cap( 'publish_events' );        
        $role->add_cap( 'delete_published_events' );

}
 add_action('admin_init','event_add_role_caps',999);



// function psp_add_project_management_role() {
//     add_role('psp_project_manager',
//                'Project Manager',
//                array(
//                    'read' => true,
//                    'edit_posts' => false,
//                    'delete_posts' => false,
//                    'publish_posts' => false,
//                    'upload_files' => true,
//                )
//            );
//       }
// add_action( 'init', 'psp_add_project_management_role' );


// add_action( 'init', 'psp_register_cpt_projects');
// function psp_register_cpt_projects() {
//      $args = array(
//  'label'               => __( 'psp_projects', 'psp_projects' ),
//  'description'         => __( 'Projects', 'psp_projects' ),
//  'labels'              => $labels,
//  'supports'            => array( 'title', 'comments', 'revisions', ),
//  'hierarchical'        => false,
//  'public'              => true,
//  'show_ui'             => true,
//  'rewrite'             => $rewrite,
//                         'capability_type'     => array('psp_project','psp_projects'),
//                         'map_meta_cap'        => true,
//  );
//  register_post_type( 'psp_projects', $args );
// }



// add_action('admin_init','psp_add_role_caps',999);
// function psp_add_role_caps() {
 
//  // Add the roles you'd like to administer the custom post types
//  $roles = array('psp_project_manager','editor','administrator');
 
//  // Loop through each role and assign capabilities
//  foreach($roles as $the_role) { 
 
//       $role = get_role($the_role);
 
//               $role->add_cap( 'read' );
//               $role->add_cap( 'read_psp_project');
//               $role->add_cap( 'read_private_psp_projects' );
//               $role->add_cap( 'edit_psp_project' );
//               $role->add_cap( 'edit_psp_projects' );
//               $role->add_cap( 'edit_others_psp_projects' );
//               $role->add_cap( 'edit_published_psp_projects' );
//               $role->add_cap( 'publish_psp_projects' );
//               $role->add_cap( 'delete_others_psp_projects' );
//               $role->add_cap( 'delete_private_psp_projects' );
//               $role->add_cap( 'delete_published_psp_projects' );
 
//  }
// }