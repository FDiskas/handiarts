<?php
/**
 * Created by JetBrains PhpStorm.
 * User: FDisk
 * Date: 2/23/12
 * Time: 12:17 AM
 * To change this template use File | Settings | File Templates.
 *
 * @package Users
 * @property CI_Session $session
 * @property CI_DB $db
 */
class User_model extends CI_Model
{

	function __construct() {
		// Call the Model constructor
		parent::__construct();
	}

	private function _required( $aRequired, $aData ) {

		foreach ( $aRequired as $sField ) {

			return isset( $aData[$sField] );
		}
	}

	private function _default( $aDefaults, $aOptions ) {

		return array_merge( $aDefaults, $aOptions );
	}

	/**
	 * Add user
	 * @param $aOptions
	 *
	 * userEmail
	 * userPassword
	 * userStatus
	 * @return bool
	 */

	public function addUser( $aOptions = array() ) {

		// Required values
		if ( ! $this->_required( array( 'userEmail', 'userPassword' ), $aOptions ) ) {

			return false;
		}

		$aOptions = $this->_default( array( 'userStatus' => 'active', 'userType' => 'mod' ), $aOptions );

		$this->db->insert( 'users', $aOptions );

		return $this->db->insert_id();

	}

	public function updateUser( $aOptions = array() ) {

		// Required values
		if ( ! $this->_required( array( 'userId' ), $aOptions ) ) {

			return false;
		}

		// Defaults
		$aOptions = $this->_default( array( 'userStatus' => 'active' ), $aOptions );

		if ( isset( $aOptions['userEmail']) ) {

			$this->db->set( 'userPassword', $aOptions['userEmail'] );
		}

		if ( isset( $aOptions['userPassword']) ) {

			$this->db->set( 'userPassword', md5( $aOptions['userPassword']) );
		}

		if ( isset( $aOptions['userType']) ) {

			$this->db->set( 'userType', $aOptions['userType'] );
		}

		$this->db->update( 'users' );

		return $this->db->effected_rows();
	}

	/**
	 * @param $aOptions
	 * Options values:
	 * userId
	 * userEmail
	 * userPassword
	 * userStatus
	 * iLimit
	 * iOffset
	 * sSortBy
	 * sSortDirection (asc, desc)
	 *
	 * @return array
	 * userId
	 * userEmail
	 * userPassword
	 * userStatus
	 */
	public function getUsers( $aOptions = array() ) {

		if ( isset( $aOptions['userId'] ) ) {

			$this->db->where( 'userId', $aOptions['userId'] );
		}

		if ( isset( $aOptions['userEmail'] ) ) {

			$this->db->where( 'userEmail', $aOptions['userEmail'] );
		}

		if ( isset( $aOptions['userStatus'] ) ) {

			$this->db->where( 'userStatus', $aOptions['userStatus'] );
		}

		if ( isset( $aOptions['userPassword'] ) ) {

			$this->db->where( 'userPassword', $aOptions['userPassword'] );
		}

		if ( isset( $aOptions['userType'] ) ) {

			$this->db->where( 'userType', $aOptions['userType'] );
		}

		// Limit / offset
		if ( isset( $aOptions['iLimit'] ) && isset( $aOptions['iOffset'] ) ) {

			$this->db->limit( $aOptions['iLimit'], $aOptions['iOffset'] );
		} elseif ( isset( $aOptions['iLimit'] ) ) {

			$this->db->limit( $aOptions['iLimit'] );
		}

		// Sort
		if ( isset( $aOptions['sSortBy'] ) && isset( $aOptions['sSortDirection'] ) ) {

			$this->db->order_by( $aOptions['sSortBy'], $aOptions['sSortDirection'] );
		}

		if ( !isset( $aOptions['userStatus'] ) ) {

			$this->db->where( 'userStatus !=', 'deleted');
		}

		$query = $this->db->get('users');

		if ( isset( $aOptions['userId']) || isset( $aOptions['userEmail'] ) ) {
			return $query->row(0);
		}

		return $query->result();
	}

	public function totalUsers( $aOptions = array() ) {

		return $this->db->count_all('users');
	}

	public function userLogin( $aOptions = array() ) {

		// Required
		if ( ! $this->_required( array('userEmail', 'userPassword'), $aOptions ) ) {

			return false;
		}

		$oUser = $this->getUsers( array(
			'userEmail' => $aOptions['userEmail'],
			'userPassword' => md5( $aOptions['userPassword'] ) )
		);

		if ( !$oUser ) {

			return false;
		}

		$this->session->set_userdata( array(
				'userEmail' => $oUser->userEmail,
				'userId' => $oUser->userId,
				'userType' => $oUser->userType
			)
		);

		return true;

	}

	public function userAccess( $aOptions = array() ) {

		if ( $this->session->userdata( 'userType' ) ) {

			if ( isset( $aOptions['userType'] ) ) {

				return in_array( $aOptions['userType'], $this->session->all_userdata( 'userType' ) );
			} else {

				return $this->session->userdata( 'userType' );
			}

		} else {

			return false;
		}
	}

	public function isAdmin() {

		return $this->session->userdata( 'userType' ) == 'admin';
	}

}
