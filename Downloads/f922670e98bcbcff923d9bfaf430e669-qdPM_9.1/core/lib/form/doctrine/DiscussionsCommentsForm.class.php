<?php
/**
*qdPM
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@qdPM.net so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade qdPM to newer
* versions in the future. If you wish to customize qdPM for your
* needs please refer to http://www.qdPM.net for more information.
*
* @copyright  Copyright (c) 2009  Sergey Kharchishin and Kym Romanets (http://www.qdpm.net)
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*/
?>
<?php

/**
 * DiscussionsComments form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DiscussionsCommentsForm extends BaseDiscussionsCommentsForm
{
  public function configure()
  {
    $discussions = $this->getOption('discussions');
    
    if($this->getObject()->isNew())
    {            
      $this->widgetSchema['discussions_status_id'] = new sfWidgetFormChoice(array('choices'=>app::getItemsChoicesByTable('DiscussionsStatus',true)),array('class'=>'form-control input-large'));
    }
    else
    {
      $this->widgetSchema['discussions_status_id'] = new sfWidgetFormInputHidden();
    }
    
        
    $this->widgetSchema['users_id'] = new sfWidgetFormInputHidden();
    
    $this->widgetSchema['created_at'] = new sfWidgetFormInputHidden();        
    $this->setDefault('created_at', date('Y-m-d H:i:s'));        
    
    $this->widgetSchema['description']->setAttributes(array('class'=>'form-control editor-auto-focus'));
        
    $this->widgetSchema['discussions_id'] = new sfWidgetFormInputHidden();    
    $this->setDefault('discussions_id', $discussions->getId());
    
    $this->widgetSchema->setLabels(array('discussions_status_id'=>'Status',                                            
                                         ));
        
  }
}
