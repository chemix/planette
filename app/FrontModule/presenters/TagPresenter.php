<?php
/**
 * @author Honza Cerny (http://honzacerny.com)
 */

namespace App\FrontModule\Presenters;
use Nette\Application\BadRequestException;


/**
 * Homepage presenter.
 */
class TagPresenter extends BasePresenter
{

	public function renderDefault($tag = '')
	{
		$selectedTag = $this->articleManager->getTag($tag);

		if (!$selectedTag){
			throw new BadRequestException;
		}

		$this->template->selectedTag = $selectedTag;
		$this->template->categories = $this->articleManager->findCategories();
		$this->template->articles = $this->articleManager->findAllByTag($tag, $this->locale);
	}

}
