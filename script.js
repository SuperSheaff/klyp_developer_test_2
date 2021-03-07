/**
 *  Adds class active to all elementSelector and not targetSelector
 */
function makeActive(elementSelector, targetSelector) {

	let group = document.querySelectorAll(elementSelector);

	for (i = 0; i < group.length; i++) {
		group[i].classList.remove('active');
	}

	targetSelector.classList.add('active');
}

/**
 *  Adds class d-none to all elementSelector and not targetSelector
 */
function filterClass(elementSelector, targetSelector) {

	let group = document.querySelectorAll(elementSelector);
	let targetGroup = document.querySelectorAll(targetSelector);

	for (i = 0; i < group.length; i++) {
		group[i].classList.add('d-none');
	}

	for (i = 0; i < targetGroup.length; i++) {
		targetGroup[i].classList.remove('d-none');
	}

}