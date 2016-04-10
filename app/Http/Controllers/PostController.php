<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BlogPost;
use GrahamCampbell\Markdown\Facades\Markdown;

// ===============================================================================================================
// Post Controller
// ---------------------------------------------------------------------------------------------------------------
// Stellar Clicker
// https://github.com/angelahnicole/Stellar-Clicker-Web
// Angela Gross
// ---------------------------------------------------------------------------------------------------------------
// 
// ===============================================================================================================

class PostController extends BaseController
{ 
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    // ------------------------------------------------------------------------------------------------------------------------------
    // ATTRIBUTES
    // ------------------------------------------------------------------------------------------------------------------------------
	
    /**
     * Array of data to pass between controller and view
     *
     * @var array
     */
    protected $data = array();
	
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
    // ------------------------------------------------------------------------------------------------------------------------------
    // VIEW CREATORS 
    // ------------------------------------------------------------------------------------------------------------------------------
	
    /**
     * Creates home page view for end-user.
     *
     * @return View Blog home page
     */
    public function index()
    {
        // Get basic information for home page
        $this->data['title'] = "The Blog";
        $this->data['showNotifications'] = true;
        $this->data['showNav'] = true;
        $this->data['showLogin'] = true;
        
        // Get all blog posts
        $this->data['posts'] = BlogPost::orderBy('created_at', 'desc')->paginate(3);
        
        // Display notifications (if there are any)
        BaseController::processNotifications();
        
        return view('blog.home', $this->data);
    }	
    
    /**
     * Creates management view for
     *
     * @return View Blog home page
     */
    public function manage()
    {
        // Get basic information for home page
        $this->data['title'] = "Manage Blog Posts";
        $this->data['showNotifications'] = true;
        $this->data['showNav'] = true;
        $this->data['showLogin'] = true;
        
        // Get all blog posts
        $this->data['posts'] = BlogPost::orderBy('created_at', 'desc')->paginate(15);
        
        // Display notifications (if there are any)
        BaseController::processNotifications();
        
        return view('blog.admin.post_manager', $this->data);
    }	
    
   /**
     * Creates a post editor view for the end-user
     *
     * @return View Blog post editor page
     */
    public function create()
    {
        // Get basic information for home page
        $this->data['title'] = "Create a Blog Post - The Blog";
        $this->data['showNotifications'] = false;
        $this->data['showNav'] = true;
        $this->data['showLogin'] = true;

        return view('blog.admin.post_editor', $this->data);
    }
    
    /**
     * Shows a blog page with its comments for end-user.
     * 
     * @param int $post Post ID
     *
     * @return View Blog page
     */
    public function show($post)
    {
        // Get blog post
        $blogPost = BlogPost::find($post);
        $this->data['post'] = $blogPost;
        
        // Get basic information for home page
        $this->data['title'] = $blogPost->title_text . ' - The Blog';
        $this->data['showNotifications'] = true;
        $this->data['showNav'] = true;
        $this->data['showLogin'] = true;
        
        // Display notifications (if there are any)
        BaseController::processNotifications();
        
        return view('blog.blog', $this->data);
    }
    
    /**
     * Shows a post editor with the given post information for the end-user
     *
     * @param int $post Post ID
     * 
     * @return View Blog post editor page
     */
    public function edit($post)
    {
        // Get blog post
        $blogPost = BlogPost::find($post);
        $this->data['post'] = $blogPost;
        
        // Get basic information for home page
        $this->data['title'] = 'Editing ' . $blogPost->title_text . ' - The Blog';
        $this->data['showNotifications'] = false;
        $this->data['showNav'] = true;
        $this->data['showLogin'] = true;
        
        return view('blog.admin.post_editor', $this->data);
    }
    
    // ------------------------------------------------------------------------------------------------------------------------------
    // DATA MODIFIERS
    // ------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * Creates a new blog post
     * 
     * @param Request $request Request object that holds HTTP Request info
     * @param int $post Post ID
     * 
     */
    public function store(Request $request)
    {
       
    }
    
    /**
     * Updates a pre-existing blog post
     * 
     * @param Request $request Request object that holds HTTP Request info
     * @param int $post Post ID
     * 
     */
    public function update(Request $request, $post)
    {
        
    }
    
    /**
     * Deletes a pre-existing blog post
     * 
     * @param int $post Post ID
     * 
     */
    public function destroy($post)
    {
        
    }
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
