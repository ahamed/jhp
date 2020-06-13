<?php
/**
 * @package Jhp
 * @author Sajeeb Ahamed <sajeeb07ahamed@gmail.com>
 * @copyright Copyright (c) 2020 Sajeeb Ahamed
 * @license MIT https://opensource.org/licenses/MIT
 */
namespace Ahamed\JsPhp\Traits;

/**
 * Trait function for array conditionals
 *
 * @since   1.0.0
 */
trait ArrayBasicsTrait
{
	/**
	 * Array push method
	 *
	 * @param   mixed   $element	The element to push. This parameter is required
	 * 								and user can pass N numbers of optional params to push.
	 *
	 * @param	mixed	...$args	Variable number of elements to push into the array
	 *
	 * @return	integer				The length of the array after pushing the elements
	 * @since	1.0.0
	 */
	public function push($element, ...$args)
	{
		$this->check();

		if (!isset($element))
		{
			throw new \UnexpectedValueException(sprintf('You must have to pass at least one value to push'));
		}

		$elements = $this->get();

		/**
		 * Push the element(s) into the elements and finally mutate the array
		 * with updated array.
		 */
		array_push($elements, $element, ...$args);
		$this->bind($elements);

		// Returns the length of the newly created array.
		return $this->length;
	}

	/**
	 * Remove an element from end the array and returns the removed element
	 * and update the existing array
	 *
	 * @return	mixed	Removed element from the end of the array.
	 * @since	1.0.0
	 */
	public function pop()
	{
		$this->check();

		$elements = $this->get();
		$length = $this->length;

		/**
		 * We cannot perform a pop operation on a empty array
		 */
		if ($length === 0)
		{
			return null;
		}

		// Popes the last element of the array.
		$removedValue = array_pop($elements);

		// Mutates the existing array with the array after popped.
		$this->bind($elements);

		// Returns the popped value.
		return $removedValue;
	}
}
