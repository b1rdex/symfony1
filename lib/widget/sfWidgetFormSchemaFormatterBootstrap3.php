<?php
class sfWidgetFormSchemaFormatterBootstrap3 extends sfWidgetFormSchemaFormatter
{
  protected
    $rowFormat                 = "<div class=\"form-group %row_class%\">\n %label%\n <div class=\"controls\">\n  %field%\n  %error%\n  %help%\n  %hidden_fields%\n </div>\n</div>\n",
    $errorRowFormat            = '%errors%',
    $errorListFormatInARow     = "<span class=\"help-block\">%errors%</span>\n",
    $errorRowFormatInARow      = "%error% ",
    $namedErrorRowFormatInARow = "%name%: %error% ",
    $helpFormat                = '<span class="help-block">%help%</span>',
    $decoratorFormat           = '%content%';

  public function formatRow($label, $field, $errors = array(), $help = '', $hiddenFields = null)
  {
    $row = parent::formatRow(
      $label,
      $field,
      $errors,
      $help,
      $hiddenFields
    );

    return strtr($row, array(
      '%row_class%' => count($errors) ? ' has-error' : '',
    ));
  }

  public function generateLabel($name, $attributes = array())
  {
    if(isset($attributes['class']))
    {
      $attributes['class'] .= ' control-label';
    }
    else
    {
      $attributes['class'] = 'control-label';
    }
    return parent::generateLabel($name, $attributes);
  }
}
