<?php
/**
 * @copyright ©2014 Quicken Loans Inc. All rights reserved. Trade Secret,
 *    Confidential and Proprietary. Any dissemination outside of Quicken Loans
 *    is strictly prohibited.
 */

namespace QL\Hal\Core\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use JsonSerializable;

class Repository implements JsonSerializable
{
    /**
     * @type int
     */
    protected $id;

    /**
     * @type string
     */
    protected $key;

    /**
     * @type string
     */
    protected $name;

    /**
     * @type string
     */
    protected $githubUser;

    /**
     * @type string
     */
    protected $githubRepo;

    /**
     * @type string
     */
    protected $email;

    /**
     * @type null|string
     */
    protected $buildCmd;

    /**
     * @type string
     */
    protected $buildTransformCmd;

    /**
     * @type string
     */
    protected $prePushCmd;

    /**
     * @type string
     */
    protected $postPushCmd;

    /**
     * The application name for elastic beanstalk
     *
     * @type string
     */
    protected $ebName;

    /**
     * @type Group
     */
    protected $group;

    /**
     * The repository deployments
     *
     * @type ArrayCollection
     */
    protected $deployments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = null;
        $this->key = null;
        $this->name = null;

        $this->githubUser = '';
        $this->githubRepo = '';
        $this->email = '';

        $this->buildCmd = '';
        $this->buildTransformCmd = '';
        $this->prePushCmd = '';
        $this->postPushCmd = '';

        $this->ebName = '';

        $this->group = null;
        $this->deployments = new ArrayCollection;
    }

    /**
     * Set the repository id
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the repository id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the repository key
     *
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Get the repository key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set the repository name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the repository name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the repository Github Repository
     *
     * @param string $githubRepo
     */
    public function setGithubRepo($githubRepo)
    {
        $this->githubRepo = $githubRepo;
    }

    /**
     * Get the repository Github repository
     *
     * @return string
     */
    public function getGithubRepo()
    {
        return $this->githubRepo;
    }

    /**
     * Set the repository Github user
     *
     * @param string $githubUser
     */
    public function setGithubUser($githubUser)
    {
        $this->githubUser = $githubUser;
    }

    /**
     * Get the repository Github user
     *
     * @return string
     */
    public function getGithubUser()
    {
        return $this->githubUser;
    }

    /**
     * Set the repository email address
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the repository email address
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the application name for elastic beanstalk
     *
     * @param string $ebName
     */
    public function setEbName($ebName)
    {
        $this->ebName = $ebName;
    }

    /**
     * Get the application name for elastic beanstalk
     *
     * @return string
     */
    public function getEbName()
    {
        return $this->ebName;
    }

    /**
     * Set the repository build command
     *
     * @param string $buildCmd
     */
    public function setBuildCmd($buildCmd)
    {
        $this->buildCmd = $buildCmd;
    }

    /**
     * Get the repository build command
     *
     * @return string
     */
    public function getBuildCmd()
    {
        return $this->buildCmd;
    }

    /**
     * Set the repository build transform command
     *
     * @param string $buildTransformCmd
     */
    public function setBuildTransformCmd($buildTransformCmd)
    {
        $this->buildTransformCmd = $buildTransformCmd;
    }

    /**
     * Get the repository build transform command
     *
     * @return string
     */
    public function getBuildTransformCmd()
    {
        return $this->buildTransformCmd;
    }

    /**
     * Set the repository post push command
     *
     * @param string $postPushCmd
     */
    public function setPostPushCmd($postPushCmd)
    {
        $this->postPushCmd = $postPushCmd;
    }

    /**
     * Get the repository post push command
     *
     * @return string
     */
    public function getPostPushCmd()
    {
        return $this->postPushCmd;
    }

    /**
     * Set the repository pre push command
     *
     * @param string $prePushCmd
     */
    public function setPrePushCmd($prePushCmd)
    {
        $this->prePushCmd = $prePushCmd;
    }

    /**
     * Get the repository pre push command
     *
     * @return string
     */
    public function getPrePushCmd()
    {
        return $this->prePushCmd;
    }

    /**
     * Set the repository group
     *
     * @param Group $group
     */
    public function setGroup(Group $group)
    {
        $this->group = $group;
    }

    /**
     * Get the repository group
     *
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $json = [
            'id' => $this->getId(),

            'identifier' => $this->getKey(),
            'name' => $this->getName(),
            'githubRepo' => $this->getGithubRepo(),
            'githubUser' => $this->getGithubUser(),
            'email' => $this->getEmail(),
            'ebName' => $this->getEbName(),

            'group' => $this->getGroup() ? $this->getGroup()->getId() : null,
        ];

        return $json;
    }
}
