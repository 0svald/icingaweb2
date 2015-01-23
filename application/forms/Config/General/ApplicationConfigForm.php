<?php
// {{{ICINGA_LICENSE_HEADER}}}
// {{{ICINGA_LICENSE_HEADER}}}

namespace Icinga\Forms\Config\General;

use DateTimeZone;
use Icinga\Application\Icinga;
use Icinga\Data\ResourceFactory;
use Icinga\Util\Translator;
use Icinga\Web\Form;


/**
 * Form class to modify the general application configuration
 */
class ApplicationConfigForm extends Form
{
    /**
     * Initialize this form
     */
    public function init()
    {
        $this->setName('form_config_general_application');
    }

    /**
     * @see Form::createElements()
     */
    public function createElements(array $formData)
    {
        $this->addElement(
            'text',
            'global_module_path',
            array(
                'label'         => $this->translate('Module Path'),
                'required'      => true,
                'value'         => implode(':', Icinga::app()->getModuleManager()->getModuleDirs()),
                'description'   => $this->translate(
                    'Contains the directories that will be searched for available modules, separated by '
                    . 'colons. Modules that don\'t exist in these directories can still be symlinked in '
                    . 'the module folder, but won\'t show up in the list of disabled modules.'
                )
            )
        );

        $this->addElement(
            'select',
            'preferences_type',
            array(
                'allowEmpty'    => true,
                'autosubmit'    => true,
                'label'         => $this->translate('User Preference Storage Type'),
                'multiOptions'  => array(
                    'ini'   => $this->translate('File System (INI Files)'),
                    'db'    => $this->translate('Database'),
                    ''      => $this->translate('Don\'t Store Preferences')
                )
            )
        );
        if (isset($formData['preferences_type']) && $formData['preferences_type'] === 'db') {
            $backends = array();
            foreach (ResourceFactory::getResourceConfigs()->toArray() as $name => $resource) {
                if ($resource['type'] === 'db') {
                    $backends[$name] = $name;
                }
            }

            $this->addElement(
                'select',
                'preferences_resource',
                array(
                    'required'      => true,
                    'multiOptions'  => $backends,
                    'label'         => $this->translate('Database Connection')
                )
            );
        }

        return $this;
    }
}
