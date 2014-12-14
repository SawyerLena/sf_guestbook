<?php

namespace Statix\GuestbookBundle\Twig\Extension;

class StatixExtension extends \Twig_Extension
{
	public function getFilters()
	{
		return array(
			new \Twig_SimpleFilter('mark', array($this, 'reviewPointFilter')),
		);
	}

	/**
	 * @param int $mark
	 * @return string
	 */
	public function reviewPointFilter($mark)
	{
		$point = '0 points';
		if ($mark >= 1 && $mark <= 5) {
			$point = $mark == 1 ? $mark . ' point' : $mark . ' points';
		}

		return $point;
	}

	public function getName()
	{
		return 'statix_extension';
	}
}