<?php

namespace Statix\GuestbookBundle\Entity;

class Review
{
	protected $id;
	protected $site;
	protected $reviewMark;
	protected $review;
	protected $email;

	public function getId()
	{
		return $this->id;
	}

	public function getSite()
	{
		return $this->site;
	}

	public function setSite($site)
	{
		$this->site = $site;
	}

	public function getReviewMark()
	{
		return $this->reviewMark;
	}

	public function setReviewMark($reviewMark)
	{
		$this->reviewMark = $reviewMark;
	}

	public function getReview()
	{
		return $this->review;
	}

	public function setReview($review)
	{
		$this->review = $review;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}
}