<?php
/* Icinga Web 2 | (c) 2016 Icinga Development Team | GPLv2+ */

namespace Icinga\Forms\Announcement;

<<<<<<< HEAD
=======
use DateTime;
>>>>>>> upstream/master
use Icinga\Authentication\Auth;
use Icinga\Data\Filter\Filter;
use Icinga\Forms\RepositoryForm;

/**
 * Create, update and delete announcements
 */
class AnnouncementForm extends RepositoryForm
{
    /**
     * {@inheritDoc}
     */
    protected function createInsertElements(array $formData)
    {
        $this->addElement(
            'text',
            'author',
            array(
<<<<<<< HEAD
                'required'  => true,
                'value'     => Auth::getInstance()->getUser()->getUsername(),
                'disabled'  => true
=======
                'disabled'  => true,
                'required'  => true,
                'value'     => Auth::getInstance()->getUser()->getUsername()
>>>>>>> upstream/master
            )
        );
        $this->addElement(
            'textarea',
            'message',
            array(
<<<<<<< HEAD
                'required'      => true,
                'label'         => $this->translate('Message'),
                'description'   => $this->translate('The message to display to users')
=======
                'description'   => $this->translate('The message to display to users'),
                'label'         => $this->translate('Message'),
                'required'      => true
>>>>>>> upstream/master
            )
        );
        $this->addElement(
            'dateTimePicker',
            'start',
            array(
<<<<<<< HEAD
                'required'      => true,
                'label'         => $this->translate('Start'),
                'description'   => $this->translate('The time to display the announcement from')
=======
                'description'   => $this->translate('The time to display the announcement from'),
                'label'         => $this->translate('Start'),
                'placeholder'   => new DateTime('tomorrow'),
                'required'      => true
>>>>>>> upstream/master
            )
        );
        $this->addElement(
            'dateTimePicker',
            'end',
            array(
<<<<<<< HEAD
                'required'      => true,
                'label'         => $this->translate('End'),
                'description'   => $this->translate('The time to display the announcement until')
=======
                'description'   => $this->translate('The time to display the announcement until'),
                'label'         => $this->translate('End'),
                'placeholder'   => new DateTime('tomorrow +1day'),
                'required'      => true
>>>>>>> upstream/master
            )
        );

        $this->setTitle($this->translate('Create a new announcement'));
        $this->setSubmitLabel($this->translate('Create'));
    }
<<<<<<< HEAD

=======
>>>>>>> upstream/master
    /**
     * {@inheritDoc}
     */
    protected function createUpdateElements(array $formData)
    {
        $this->createInsertElements($formData);
        $this->setTitle(sprintf($this->translate('Edit announcement %s'), $this->getIdentifier()));
        $this->setSubmitLabel($this->translate('Save'));
    }

    /**
     * {@inheritDoc}
     */
    protected function createDeleteElements(array $formData)
    {
        $this->setTitle(sprintf($this->translate('Remove announcement %s?'), $this->getIdentifier()));
        $this->setSubmitLabel($this->translate('Yes'));
    }

    /**
     * {@inheritDoc}
     */
    protected function createFilter()
    {
        return Filter::where('id', $this->getIdentifier());
    }

    /**
     * {@inheritDoc}
     */
    protected function getInsertMessage($success)
    {
        return $success
            ? $this->translate('Announcement created')
            : $this->translate('Failed to create announcement');
    }

    /**
     * {@inheritDoc}
     */
    protected function getUpdateMessage($success)
    {
        return $success
            ? $this->translate('Announcement updated')
            : $this->translate('Failed to update announcement');
    }

    /**
     * {@inheritDoc}
     */
    protected function getDeleteMessage($success)
    {
        return $success
            ? $this->translate('Announcement removed')
            : $this->translate('Failed to remove announcement');
    }
}
