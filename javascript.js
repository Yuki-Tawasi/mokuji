/* 親要素が非表示があるかチェック */
function _visibilityCheck(targetElement) {
  if (targetElement.offsetParent === null) {
    return false;
  }

  let target = targetElement;
  do {
    const style = getComputedStyle(target);

    if (style.display === 'none'
      || style.visibility !== 'visible'
      || parseFloat(style.opacity || '') <= 0.0
      || parseInt(style.height || '', 10) <= 0
      || parseInt(style.width || '', 10) <= 0
    ) {
      return false;
    }

    target = target.parentElement;
  } while (target !== null);

  return true;
}