<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Service
 */

namespace ZendService\AgileZen\Resources;

use ZendService\AgileZen\AbstractEntity;
use ZendService\AgileZen\AgileZen;

/**
 * @category   Zend
 * @package    Zend_Service
 * @subpackage AgileZen_Resources
 */
class Comment extends AbstractEntity
{
    /**
     * Text
     *
     * @var string
     */
    protected $text;

    /**
     * Create time
     *
     * @var string
     */
    protected $createTime;

    /**
     * Author
     *
     * @var string
     */
    protected $author;

    /**
     * Service
     *
     * @var AgileZen
     */
    protected $service;

    /**
     * Project Id
     *
     * @var integer
     */
    protected $projectId;

    /**
     * Constructor
     *
     * @param AgileZen $service
     * @param array $data
     */
    public function __construct(AgileZen $service, array $data)
    {
        if (!array_key_exists('id', $data)) {
             throw new Exception\InvalidArgumentException("You must pass the id of the comment");
        }

        $this->text       = $data['text'];
        $this->createTime = $data['createTime'];
        $this->author     = new User($service, $data['author']);
        $this->projectId  = $data['projectId'];
        $this->service    = $service;

        parent::__construct($data['id']);
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get create time
     *
     * @return string
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * Get author
     *
     * @return User
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Get the project's Id
     *
     * @return integer
     */
    public function getProjectId()
    {
        return $this->projectId;
    }
}
