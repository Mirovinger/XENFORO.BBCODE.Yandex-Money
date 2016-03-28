<?php namespace CSI\BbCodeYandexMoney\BbCode\Formatter;

/**
 * Class Base
 * @package CSI\BbCodeYandexMoney\BbCode\Formatter
 */
class Base
{
  /**
   * @param array $tag
   * @param array $rendererStates
   * @param \XenForo_BbCode_Formatter_Base $formatter
   * @return mixed
   */
  public static function getBbCodeYandexMoneyForm(array $tag, array $rendererStates, \XenForo_BbCode_Formatter_Base $formatter)
  {
    $xenOptions = \XenForo_Application::get('options');
    $xenVisitor = \XenForo_Visitor::getInstance();
    $xenVisitor_id = $xenVisitor->getUserId();
    $xenVisitor_name = $xenVisitor->get('username');
    $xenVisitor_email = $xenVisitor->get('email');

    $label = 'UserID-' . $xenVisitor_id;

    if ($xenVisitor_id) {
      $from = $xenVisitor_name . '/ID:' . $xenVisitor_id . '/' . $xenVisitor_email;
    } else {
      $from = 'Guest';
    }

    $tagOption = array_map('trim', explode('|', $tag['option']));

    if (count($tagOption) == 9) {
      $optAccount = $tagOption[0];
      $optTargets = $tagOption[1] . ' (' . $from . ')';
      $optWriter = $tagOption[2];
      $optBtnText = $tagOption[3];
      $optComment = $tagOption[4];
      $optFio = $tagOption[5];
      $optMail = $tagOption[6];
      $optPhone = $tagOption[7];
      $optAddress = $tagOption[8];
    } else {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optAccount) || !preg_match('#^(\d+)$#', $optAccount)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optWriter) || !preg_match('#^(seller|buyer)$#', $optWriter)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optBtnText) || !preg_match('#^([1-4])$#', $optBtnText)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optComment) || !preg_match('#^(0|1)$#', $optComment)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optFio) || !preg_match('#^(0|1)$#', $optFio)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optMail) || !preg_match('#^(0|1)$#', $optMail)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optPhone) || !preg_match('#^(0|1)$#', $optPhone)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optAddress) || !preg_match('#^(0|1)$#', $optAddress)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    $tagContent = $formatter->renderSubTree($tag['children'], $rendererStates);

    if (!preg_match('#^(\d+)$#', $tagContent)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    $view = $formatter->getView();

    if ($view) {
      $template = $view->createTemplateObject('csiXF_bbCode_58D2B594_tag_form',
        array(
          'sum' => $tagContent,
          'account' => $optAccount,
          'label' => urlencode($label),
          'from' => urlencode($from),
          'targets' => urlencode($optTargets),
          'writer' => urlencode($optWriter),
          'btn_text' => urlencode($optBtnText),
          'comment' => urlencode($optComment),
          'fio' => urlencode($optFio),
          'mail' => urlencode($optMail),
          'phone' => urlencode($optPhone),
          'address' => urlencode($optAddress),
        ));

      $tagContent = $template->render();
      return trim($tagContent);
    }

    return $tagContent;
  }

  /**
   * @param array $tag
   * @param array $rendererStates
   * @param \XenForo_BbCode_Formatter_Base $formatter
   * @return mixed
   */
  public static function getBbCodeYandexMoneyButton(array $tag, array $rendererStates, \XenForo_BbCode_Formatter_Base $formatter)
  {
    $xenOptions = \XenForo_Application::get('options');
    $xenVisitor = \XenForo_Visitor::getInstance();
    $xenVisitor_id = $xenVisitor->getUserId();
    $xenVisitor_name = $xenVisitor->get('username');
    $xenVisitor_email = $xenVisitor->get('email');

    $label = 'UserID-' . $xenVisitor_id;

    if ($xenVisitor_id) {
      $from = $xenVisitor_name . '/ID:' . $xenVisitor_id . '/' . $xenVisitor_email;
    } else {
      $from = 'Guest';
    }

    $tagOption = array_map('trim', explode('|', $tag['option']));

    if (count($tagOption) == 10) {
      $optAccount = $tagOption[0];
      $optTargets = $tagOption[1] . ' (' . $from . ')';
      $optPaymentType = $tagOption[2];
      $optBtnText = $tagOption[3];
      $optBtnSize = $tagOption[4];
      $optBtnColor = $tagOption[5];
      $optFio = $tagOption[6];
      $optMail = $tagOption[7];
      $optPhone = $tagOption[8];
      $optAddress = $tagOption[9];
    } else {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optAccount) || !preg_match('#^(\d+)$#', $optAccount)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optPaymentType) || !preg_match('#^(yamoney|any-card)$#', $optPaymentType)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optBtnText) || !preg_match('#^([1-6])$#', $optBtnText)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optBtnSize) || !preg_match('#^(s|m|l)$#', $optBtnSize)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optBtnColor) || !preg_match('#^(orange|white|black)$#', $optBtnColor)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optFio) || !preg_match('#^(0|1)$#', $optFio)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optMail) || !preg_match('#^(0|1)$#', $optMail)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optPhone) || !preg_match('#^(0|1)$#', $optPhone)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    if (!isset($optAddress) || !preg_match('#^(0|1)$#', $optAddress)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    $tagContent = $formatter->renderSubTree($tag['children'], $rendererStates);

    if (!preg_match('#^(\d+)$#', $tagContent)) {
      return $formatter->renderInvalidTag($tag, $rendererStates);
    }

    $view = $formatter->getView();

    if ($view) {
      $template = $view->createTemplateObject('csiXF_bbCode_58D2B594_tag_button',
        array(
          'sum' => $tagContent,
          'account' => $optAccount,
          'label' => urlencode($label),
          'from' => urlencode($from),
          'targets' => urlencode($optTargets),
          'payment_type' => urlencode($optPaymentType),
          'btn_text' => urlencode($optBtnText),
          'btn_size' => urlencode($optBtnSize),
          'btn_color' => urlencode($optBtnColor),
          'fio' => urlencode($optFio),
          'mail' => urlencode($optMail),
          'phone' => urlencode($optPhone),
          'address' => urlencode($optAddress),
        ));

      $tagContent = $template->render();
      return trim($tagContent);
    }

    return $tagContent;
  }
}
