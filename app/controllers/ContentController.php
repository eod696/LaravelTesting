<?php
class ContentController extends BaseController {
	
	// GET: /{slug}
	public function getPage($slug) {
		$page = Page::where('slug', '=', $slug)->firstOrFail();
		return View::make('page', ['page' => $page]);
	}
	
	// GET: /admin/edit-page/{id}
	public function editPage($id){
		$page = Page::find($id);
		return View::make('editpage', ['page' => $page]);
	}
	
	// POST: /admin/edit-page/{id}
	public function updatePage($id){
		// Find the page to edit
		$page = Page::find($id);
		// Edit the page's properties
		$page->slug = Input::get('slug');
		$page->title = Input::get('title');
		$page->body = Input::get('body');
		// Save changes
		$page->save();
		
		// Reload page with success message
		return Redirect::route('editPage', ['id' => $page->id])->with('msg', 'Page successfully updated!');
	}
}
?>