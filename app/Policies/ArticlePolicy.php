<?php

namespace Corp\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use Corp\User;

use Corp\Article;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function save(User $user) {
		return $user->canDo('ADD_ARTICLES');
	}
	
	public function edit(User $user) {
		return $user->canDo('UPDATE_ARTICLES');
	}
	
	public function destroy(User $user, Article $article) {
		return ($user->canDo('DELETE_ARTICLES')  && $user->id == $article->user_id);
	}
	
	
  }
