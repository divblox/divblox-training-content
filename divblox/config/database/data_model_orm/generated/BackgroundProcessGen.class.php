<?php
/**
 * The abstract BackgroundProcessGen class defined here is
 * code-generated and contains all the basic CRUD-type functionality as well as
 * basic methods to handle relationships and index-based loading.
 *
 * To use, you should use the BackgroundProcess subclass which
 * extends this BackgroundProcessGen class.
 *
 * Because subsequent re-code generations will overwrite any changes to this
 * file, you should leave this file unaltered to prevent yourself from losing
 * any information or code changes.  All customizations should be done by
 * overriding existing or implementing new methods, properties and variables
 * in the BackgroundProcess class.
 *
 * @package divblox_app
 * @subpackage GeneratedDataObjects
 * @property-read integer $Id the value for intId (Read-Only PK)
 * @property string $PId the value for strPId 
 * @property string $UserId the value for strUserId 
 * @property dxDateTime $UpdateDateTime the value for dttUpdateDateTime 
 * @property string $Status the value for strStatus 
 * @property string $Summary the value for strSummary 
 * @property dxDateTime $StartDateTime the value for dttStartDateTime 
 * @property-read string $LastUpdated the value for strLastUpdated (Read-Only Timestamp)
 * @property integer $ObjectOwner the value for intObjectOwner 
 * @property-read BackgroundProcessUpdate $_BackgroundProcessUpdate the value for the private _objBackgroundProcessUpdate (Read-Only) if set due to an expansion on the BackgroundProcessUpdate.BackgroundProcess reverse relationship
 * @property-read BackgroundProcessUpdate[] $_BackgroundProcessUpdateArray the value for the private _objBackgroundProcessUpdateArray (Read-Only) if set due to an ExpandAsArray on the BackgroundProcessUpdate.BackgroundProcess reverse relationship
 * @property-read boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
 */
class BackgroundProcessGen extends dxBaseClass implements IteratorAggregate {

    ///////////////////////////////////////////////////////////////////////
    // PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
    ///////////////////////////////////////////////////////////////////////

    /**
     * Protected member variable that maps to the database PK Identity column BackgroundProcess.Id
     * @var integer intId
     */
    protected $intId;
    const IdDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.PId
     * @var string strPId
     */
    protected $strPId;
    const PIdMaxLength = 50;
    const PIdDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.UserId
     * @var string strUserId
     */
    protected $strUserId;
    const UserIdMaxLength = 50;
    const UserIdDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.UpdateDateTime
     * @var dxDateTime dttUpdateDateTime
     */
    protected $dttUpdateDateTime;
    const UpdateDateTimeDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.Status
     * @var string strStatus
     */
    protected $strStatus;
    const StatusMaxLength = 50;
    const StatusDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.Summary
     * @var string strSummary
     */
    protected $strSummary;
    const SummaryDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.StartDateTime
     * @var dxDateTime dttStartDateTime
     */
    protected $dttStartDateTime;
    const StartDateTimeDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.LastUpdated
     * @var string strLastUpdated
     */
    protected $strLastUpdated;
    const LastUpdatedDefault = null;


    /**
     * Protected member variable that maps to the database column BackgroundProcess.ObjectOwner
     * @var integer intObjectOwner
     */
    protected $intObjectOwner;
    const ObjectOwnerDefault = null;


    /**
     * Private member variable that stores a reference to a single BackgroundProcessUpdate object
     * (of type BackgroundProcessUpdate), if this BackgroundProcess object was restored with
     * an expansion on the BackgroundProcessUpdate association table.
     * @var BackgroundProcessUpdate _objBackgroundProcessUpdate;
     */
    private $_objBackgroundProcessUpdate;

    /**
     * Private member variable that stores a reference to an array of BackgroundProcessUpdate objects
     * (of type BackgroundProcessUpdate[]), if this BackgroundProcess object was restored with
     * an ExpandAsArray on the BackgroundProcessUpdate association table.
     * @var BackgroundProcessUpdate[] _objBackgroundProcessUpdateArray;
     */
    private $_objBackgroundProcessUpdateArray = null;

    /**
     * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
     * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
     * GetVirtualAttribute.
     * @var string[] $__strVirtualAttributeArray
     */
    protected $__strVirtualAttributeArray = array();

    /**
     * Protected internal member variable that specifies whether or not this object is Restored from the database.
     * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
     * @var bool __blnRestored;
     */
    protected $__blnRestored;

    ///////////////////////////////
    // PROTECTED MEMBER OBJECTS
    ///////////////////////////////


    /**
     * Initialize each property with default values from database definition
     */
    public function Initialize() {
        $this->intId = BackgroundProcess::IdDefault;
        $this->strPId = BackgroundProcess::PIdDefault;
        $this->strUserId = BackgroundProcess::UserIdDefault;
        $this->dttUpdateDateTime = (BackgroundProcess::UpdateDateTimeDefault === null)?null:new dxDateTime(BackgroundProcess::UpdateDateTimeDefault);
        $this->strStatus = BackgroundProcess::StatusDefault;
        $this->strSummary = BackgroundProcess::SummaryDefault;
        $this->dttStartDateTime = (BackgroundProcess::StartDateTimeDefault === null)?null:new dxDateTime(BackgroundProcess::StartDateTimeDefault);
        $this->strLastUpdated = BackgroundProcess::LastUpdatedDefault;
        $this->intObjectOwner = BackgroundProcess::ObjectOwnerDefault;
    }

    ///////////////////////////////
    // CLASS-WIDE LOAD AND COUNT METHODS
    ///////////////////////////////

    /**
     * Static method to retrieve the Database object that owns this class.
     * @return dxDatabaseBase reference to the Database object that can query this class
     */
    public static function GetDatabase() {
        return ProjectFunctions::$Database[1];
    }

    /**
     * Load a BackgroundProcess from PK Info
     * @param integer $intId
     * @param dxQueryClause[] $objOptionalClauses additional optional dxQueryClause objects for this query
     * @return BackgroundProcess
     */
    public static function Load($intId, $objOptionalClauses = null) {
        $strCacheKey = false;
        if (ProjectFunctions::$objCacheProvider && !$objOptionalClauses && ProjectFunctions::$Database[1]->Caching) {
            $strCacheKey = ProjectFunctions::$objCacheProvider->CreateKey(ProjectFunctions::$Database[1]->Database, 'BackgroundProcess', $intId);
            $objCachedObject = ProjectFunctions::$objCacheProvider->Get($strCacheKey);
            if ($objCachedObject !== false) {
                return $objCachedObject;
            }
        }
        // Use QuerySingle to Perform the Query
        $objToReturn = BackgroundProcess::QuerySingle(
            dxQuery::AndCondition(
                dxQuery::Equal(dxQueryN::BackgroundProcess()->Id, $intId)
            ),
            $objOptionalClauses
        );
        if ($strCacheKey !== false) {
            ProjectFunctions::$objCacheProvider->Set($strCacheKey, $objToReturn);
        }
        return $objToReturn;
    }

    /**
     * Load all BackgroundProcesses
     * @param dxQueryClause[] $objOptionalClauses additional optional dxQueryClause objects for this query
     * @return BackgroundProcess[]
     */
    public static function LoadAll($objOptionalClauses = null) {
        if (func_num_args() > 1) {
            throw new dxCallerException("LoadAll must be called with an array of optional clauses as a single argument");
        }
        // Call BackgroundProcess::QueryArray to perform the LoadAll query
        try {
            return BackgroundProcess::QueryArray(dxQuery::All(), $objOptionalClauses);
        } catch (dxCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    /**
     * Count all BackgroundProcesses
     * @return int
     */
    public static function CountAll() {
        // Call BackgroundProcess::QueryCount to perform the CountAll query
        return BackgroundProcess::QueryCount(dxQuery::All());
    }

    ///////////////////////////////
    // DIVBLOX QUERY-RELATED METHODS
    ///////////////////////////////

    /**
     * Internally called method to assist with calling divblox Query for this class
     * on load methods.
     * @param dxQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
     * @param dxQueryCondition $objConditions any conditions on the query, itself
     * @param dxQueryClause[] $objOptionalClausees additional optional dxQueryClause object or array of dxQueryClause objects for this query
     * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
     * @param boolean $blnCountOnly only select a rowcount
     * @return string the query statement
     */
    protected static function BuildQueryStatement(&$objQueryBuilder, dxQueryCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Create/Build out the QueryBuilder object with BackgroundProcess-specific SELET and FROM fields
        $objQueryBuilder = new dxQueryBuilder($objDatabase, 'BackgroundProcess');

        $blnAddAllFieldsToSelect = true;
        if ($objDatabase->OnlyFullGroupBy) {
            // see if we have any group by or aggregation clauses, if yes, don't add the fields to select clause
            if ($objOptionalClauses instanceof dxQueryClause) {
                if ($objOptionalClauses instanceof dxQueryAggregationClause || $objOptionalClauses instanceof dxQueryGroupBy) {
                    $blnAddAllFieldsToSelect = false;
                }
            } else if (is_array($objOptionalClauses)) {
                foreach ($objOptionalClauses as $objClause) {
                    if ($objClause instanceof dxQueryAggregationClause || $objClause instanceof dxQueryGroupBy) {
                        $blnAddAllFieldsToSelect = false;
                        break;
                    }
                }
            }
        }
        if ($blnAddAllFieldsToSelect) {
            BackgroundProcess::GetSelectFields($objQueryBuilder, null, dxQuery::extractSelectClause($objOptionalClauses));
        }
        $objQueryBuilder->AddFromItem('BackgroundProcess');

        // Set "CountOnly" option (if applicable)
        if ($blnCountOnly)
            $objQueryBuilder->SetCountOnlyFlag();

        // Apply Any Conditions
        if ($objConditions)
            try {
                $objConditions->UpdateQueryBuilder($objQueryBuilder);
            } catch (dxCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }

        // Iterate through all the Optional Clauses (if any) and perform accordingly
        if ($objOptionalClauses) {
            if ($objOptionalClauses instanceof dxQueryClause)
                $objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
            else if (is_array($objOptionalClauses))
                foreach ($objOptionalClauses as $objClause)
                    $objClause->UpdateQueryBuilder($objQueryBuilder);
            else
                throw new dxCallerException('Optional Clauses must be a dxQueryClause object or an array of dxQueryClause objects');
        }

        // Get the SQL Statement
        $strQuery = $objQueryBuilder->GetStatement();

        // Prepare the Statement with the Query Parameters (if applicable)
        if ($mixParameterArray) {
            if (is_array($mixParameterArray)) {
                if (ProjectFunctions::getDataSetSize($mixParameterArray))
                    $strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

                // Ensure that there are no other Unresolved Named Parameters
                if (strpos($strQuery, chr(dxQueryNamedValue::DelimiterCode) . '{') !== false)
                    throw new dxCallerException('Unresolved named parameters in the query');
            } else
                throw new dxCallerException('Parameter Array must be an array of name-value parameter pairs');
        }

        // Return the Objects
        return $strQuery;
    }

    /**
     * Static divblox Query method to query for a single BackgroundProcess object.
     * Uses BuildQueryStatment to perform most of the work.
     * @param dxQueryCondition $objConditions any conditions on the query, itself
     * @param dxQueryClause[] $objOptionalClausees additional optional dxQueryClause objects for this query
     * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
     * @return BackgroundProcess the queried object
     */
    public static function QuerySingle(dxQueryCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
        // Get the Query Statement
        try {
            $strQuery = BackgroundProcess::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
        } catch (dxCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        // Perform the Query, Get the First Row, and Instantiate a new BackgroundProcess object
        $objDbResult = $objQueryBuilder->Database->Query($strQuery);

        // Do we have to expand anything?
        if ($objQueryBuilder->ExpandAsArrayNode) {
            $objToReturn = array();
            $objPrevItemArray = array();
            while ($objDbRow = $objDbResult->GetNextRow()) {
                $objItem = BackgroundProcess::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNode, $objPrevItemArray, $objQueryBuilder->ColumnAliasArray);
                if ($objItem) {
                    $objToReturn[] = $objItem;
                    $objPrevItemArray[$objItem->intId][] = $objItem;
                }
            }
            if (ProjectFunctions::getDataSetSize($objToReturn)) {
                // Since we only want the object to return, lets return the object and not the array.
                return $objToReturn[0];
            } else {
                return null;
            }
        } else {
            // No expands just return the first row
            $objDbRow = $objDbResult->GetNextRow();
            if(null === $objDbRow)
                return null;
            return BackgroundProcess::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
        }
    }

    /**
     * Static divblox Query method to query for an array of BackgroundProcess objects.
     * Uses BuildQueryStatment to perform most of the work.
     * @param dxQueryCondition $objConditions any conditions on the query, itself
     * @param dxQueryClause[] $objOptionalClausees additional optional dxQueryClause objects for this query
     * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
     * @return BackgroundProcess[] the queried objects as an array
     */
    public static function QueryArray(dxQueryCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
        // Get the Query Statement
        try {
            $strQuery = BackgroundProcess::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
        } catch (dxCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        // Perform the Query and Instantiate the Array Result
        $objDbResult = $objQueryBuilder->Database->Query($strQuery);
        return BackgroundProcess::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
    }

    /**
     * Static divblox query method to issue a query and get a cursor to progressively fetch its results.
     * Uses BuildQueryStatment to perform most of the work.
     * @param dxQueryCondition $objConditions any conditions on the query, itself
     * @param dxQueryClause[] $objOptionalClauses additional optional dxQueryClause objects for this query
     * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
     * @return dxDatabaseResultBase the cursor resource instance
     */
    public static function QueryCursor(dxQueryCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
        // Get the query statement
        try {
            $strQuery = BackgroundProcess::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
        } catch (dxCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        // Perform the query
        $objDbResult = $objQueryBuilder->Database->Query($strQuery);

        // Return the results cursor
        $objDbResult->QueryBuilder = $objQueryBuilder;
        return $objDbResult;
    }

    /**
     * Static divblox Query method to query for a count of BackgroundProcess objects.
     * Uses BuildQueryStatment to perform most of the work.
     * @param dxQueryCondition $objConditions any conditions on the query, itself
     * @param dxQueryClause[] $objOptionalClausees additional optional dxQueryClause objects for this query
     * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
     * @return integer the count of queried objects as an integer
     */
    public static function QueryCount(dxQueryCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
        // Get the Query Statement
        try {
            $strQuery = BackgroundProcess::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
        } catch (dxCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }

        // Perform the Query and return the row_count
        $objDbResult = $objQueryBuilder->Database->Query($strQuery);

        // Figure out if the query is using GroupBy
        $blnGrouped = false;

        if ($objOptionalClauses) {
            if ($objOptionalClauses instanceof dxQueryClause) {
                if ($objOptionalClauses instanceof dxQueryGroupBy) {
                    $blnGrouped = true;
                }
            } else if (is_array($objOptionalClauses)) {
                foreach ($objOptionalClauses as $objClause) {
                    if ($objClause instanceof dxQueryGroupBy) {
                        $blnGrouped = true;
                        break;
                    }
                }
            } else {
                throw new dxCallerException('Optional Clauses must be a dxQueryClause object or an array of dxQueryClause objects');
            }
        }

        if ($blnGrouped)
            // Groups in this query - return the count of Groups (which is the count of all rows)
            return $objDbResult->CountRows();
        else {
            // No Groups - return the sql-calculated count(*) value
            $strDbRow = $objDbResult->FetchRow();
            return dxType::Cast($strDbRow[0], dxType::Integer);
        }
    }

    public static function QueryArrayCached(dxQueryCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null, $blnForceUpdate = false) {
        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        $strQuery = BackgroundProcess::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);

        $objCache = new dxCache('dxquery/backgroundprocess', $strQuery);
        $cacheData = $objCache->GetData();

        if (!$cacheData || $blnForceUpdate) {
            $objDbResult = $objQueryBuilder->Database->Query($strQuery);
            $arrResult = BackgroundProcess::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNode, $objQueryBuilder->ColumnAliasArray);
            $objCache->SaveData(serialize($arrResult));
        } else {
            $arrResult = unserialize($cacheData);
        }

        return $arrResult;
    }

    /**
     * Updates a dxQueryBuilder with the SELECT fields for this BackgroundProcess
     * @param dxQueryBuilder $objBuilder the Query Builder object to update
     * @param string $strPrefix optional prefix to add to the SELECT fields
     */
    public static function GetSelectFields(dxQueryBuilder $objBuilder, $strPrefix = null, dxQuerySelect $objSelect = null) {
        if ($strPrefix) {
            $strTableName = $strPrefix;
            $strAliasPrefix = $strPrefix . '__';
        } else {
            $strTableName = 'BackgroundProcess';
            $strAliasPrefix = '';
        }

        if ($objSelect) {
            $objBuilder->AddSelectItem($strTableName, 'Id', $strAliasPrefix . 'Id');
            $objSelect->AddSelectItems($objBuilder, $strTableName, $strAliasPrefix);
        } else {
            $objBuilder->AddSelectItem($strTableName, 'Id', $strAliasPrefix . 'Id');
            $objBuilder->AddSelectItem($strTableName, 'PId', $strAliasPrefix . 'PId');
            $objBuilder->AddSelectItem($strTableName, 'UserId', $strAliasPrefix . 'UserId');
            $objBuilder->AddSelectItem($strTableName, 'UpdateDateTime', $strAliasPrefix . 'UpdateDateTime');
            $objBuilder->AddSelectItem($strTableName, 'Status', $strAliasPrefix . 'Status');
            $objBuilder->AddSelectItem($strTableName, 'Summary', $strAliasPrefix . 'Summary');
            $objBuilder->AddSelectItem($strTableName, 'StartDateTime', $strAliasPrefix . 'StartDateTime');
            $objBuilder->AddSelectItem($strTableName, 'LastUpdated', $strAliasPrefix . 'LastUpdated');
            $objBuilder->AddSelectItem($strTableName, 'ObjectOwner', $strAliasPrefix . 'ObjectOwner');
        }
    }
    ///////////////////////////////
    // INSTANTIATION-RELATED METHODS
    ///////////////////////////////

    /**
     * Do a possible array expansion on the given node. If the node is an ExpandAsArray node,
     * it will add to the corresponding array in the object. Otherwise, it will follow the node
     * so that any leaf expansions can be handled.
     *
     * @param DatabaseRowBase $objDbRow
     * @param dxQueryBaseNode $objChildNode
     * @param dxBaseClass $objPreviousItem
     * @param string[] $strColumnAliasArray
     */

    public static function ExpandArray ($objDbRow, $strAliasPrefix, $objNode, $objPreviousItemArray, $strColumnAliasArray) {
        if (!$objNode->ChildNodeArray) {
            return false;
        }

        $strAlias = $strAliasPrefix . 'Id';
        $strColumnAlias = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $blnExpanded = false;

        foreach ($objPreviousItemArray as $objPreviousItem) {
            if ($objPreviousItem->intId != $objDbRow->GetColumn($strColumnAlias, 'Integer')) {
                continue;
            }

            foreach ($objNode->ChildNodeArray as $objChildNode) {
                $strPropName = $objChildNode->_PropertyName;
                $strClassName = $objChildNode->_ClassName;
                $blnExpanded = false;
                $strLongAlias = $objChildNode->ExtendedAlias();

                if ($objChildNode->ExpandAsArray) {
                    $strVarName = '_obj' . $strPropName . 'Array';
                    if (null === $objPreviousItem->$strVarName) {
                        $objPreviousItem->$strVarName = array();
                    }
                    if ($intPreviousChildItemCount = ProjectFunctions::getDataSetSize($objPreviousItem->$strVarName)) {
                        $objPreviousChildItems = $objPreviousItem->$strVarName;
                        if ($objChildNode->_Type == "association") {
                            $objChildNode = $objChildNode->FirstChild();
                        }
                        $nextAlias = $objChildNode->ExtendedAlias() . '__';

                        $objChildItem = call_user_func(array ($strClassName, 'InstantiateDbRow'), $objDbRow, $nextAlias, $objChildNode, $objPreviousChildItems, $strColumnAliasArray);
                        if ($objChildItem) {
                            $objPreviousItem->{$strVarName}[] = $objChildItem;
                            $blnExpanded = true;
                        } elseif ($objChildItem === false) {
                            $blnExpanded = true;
                        }
                    }
                } else {

                    // Follow single node if keys match
                    $nodeType = $objChildNode->_Type;
                    if ($nodeType == 'reverse_reference' || $nodeType == 'association') {
                        $strVarName = '_obj' . $strPropName;
                    } else {
                        $strVarName = 'obj' . $strPropName;
                    }

                    if (null === $objPreviousItem->$strVarName) {
                        return false;
                    }

                    $objPreviousChildItems = array($objPreviousItem->$strVarName);
                    $blnResult = call_user_func(array ($strClassName, 'ExpandArray'), $objDbRow, $strLongAlias . '__', $objChildNode, $objPreviousChildItems, $strColumnAliasArray);

                    if ($blnResult) {
                        $blnExpanded = true;
                    }
                }
            }
        }
        return $blnExpanded;
    }

    /**
     * Instantiate a BackgroundProcess from a Database Row.
     * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
     * is calling this BackgroundProcess::InstantiateDbRow in order to perform
     * early binding on referenced objects.
     * @param DatabaseRowBase $objDbRow
     * @param string $strAliasPrefix
     * @param dxQueryBaseNode $objExpandAsArrayNode
     * @param dxBaseClass $arrPreviousItem
     * @param string[] $strColumnAliasArray
     * @return mixed Either a BackgroundProcess, or false to indicate the dbrow was used in an expansion, or null to indicate that this leaf is a duplicate.
    */
    public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $objExpandAsArrayNode = null, $objPreviousItemArray = null, $strColumnAliasArray = array()) {
        // If blank row, return null
        if (!$objDbRow) {
            return null;
        }

        if (empty ($strAliasPrefix) && $objPreviousItemArray) {
            $strColumnAlias = !empty($strColumnAliasArray['Id']) ? $strColumnAliasArray['Id'] : 'Id';
            $key = $objDbRow->GetColumn($strColumnAlias, 'Integer');
            $objPreviousItemArray = (!empty ($objPreviousItemArray[$key]) ? $objPreviousItemArray[$key] : null);
        }

        // See if we're doing an array expansion on the previous item
        if ($objExpandAsArrayNode &&
                is_array($objPreviousItemArray) &&
                ProjectFunctions::getDataSetSize($objPreviousItemArray)) {

            if (BackgroundProcess::ExpandArray ($objDbRow, $strAliasPrefix, $objExpandAsArrayNode, $objPreviousItemArray, $strColumnAliasArray)) {
                return false; // db row was used but no new object was created
            }
        }

        // Create a new instance of the BackgroundProcess object
        $objToReturn = new BackgroundProcess();
        $objToReturn->__blnRestored = true;

        $strAlias = $strAliasPrefix . 'Id';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
        $strAlias = $strAliasPrefix . 'PId';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->strPId = $objDbRow->GetColumn($strAliasName, 'VarChar');
        $strAlias = $strAliasPrefix . 'UserId';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->strUserId = $objDbRow->GetColumn($strAliasName, 'VarChar');
        $strAlias = $strAliasPrefix . 'UpdateDateTime';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->dttUpdateDateTime = $objDbRow->GetColumn($strAliasName, 'DateTime');
        $strAlias = $strAliasPrefix . 'Status';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->strStatus = $objDbRow->GetColumn($strAliasName, 'VarChar');
        $strAlias = $strAliasPrefix . 'Summary';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->strSummary = $objDbRow->GetColumn($strAliasName, 'Blob');
        $strAlias = $strAliasPrefix . 'StartDateTime';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->dttStartDateTime = $objDbRow->GetColumn($strAliasName, 'DateTime');
        $strAlias = $strAliasPrefix . 'LastUpdated';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->strLastUpdated = $objDbRow->GetColumn($strAliasName, 'VarChar');
        $strAlias = $strAliasPrefix . 'ObjectOwner';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objToReturn->intObjectOwner = $objDbRow->GetColumn($strAliasName, 'Integer');

        if (isset($objPreviousItemArray) && is_array($objPreviousItemArray)) {
            foreach ($objPreviousItemArray as $objPreviousItem) {
                if ($objToReturn->Id != $objPreviousItem->Id) {
                    continue;
                }
                // this is a duplicate leaf in a complex join
                return null; // indicates no object created and the db row has not been used
            }
        }

        // Instantiate Virtual Attributes
        $strVirtualPrefix = $strAliasPrefix . '__';
        $strVirtualPrefixLength = strlen($strVirtualPrefix);
        foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
            if (strncmp($strColumnName, $strVirtualPrefix, $strVirtualPrefixLength) == 0)
                $objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
        }


        // Prepare to Check for Early/Virtual Binding

        $objExpansionAliasArray = array();
        if ($objExpandAsArrayNode) {
            $objExpansionAliasArray = $objExpandAsArrayNode->ChildNodeArray;
        }

        if (!$strAliasPrefix)
            $strAliasPrefix = 'BackgroundProcess__';




        // Check for BackgroundProcessUpdate Virtual Binding
        $strAlias = $strAliasPrefix . 'backgroundprocessupdate__Id';
        $strAliasName = !empty($strColumnAliasArray[$strAlias]) ? $strColumnAliasArray[$strAlias] : $strAlias;
        $objExpansionNode = (empty($objExpansionAliasArray['backgroundprocessupdate']) ? null : $objExpansionAliasArray['backgroundprocessupdate']);
        $blnExpanded = ($objExpansionNode && $objExpansionNode->ExpandAsArray);
        if ($blnExpanded && null === $objToReturn->_objBackgroundProcessUpdateArray)
            $objToReturn->_objBackgroundProcessUpdateArray = array();
        if (!is_null($objDbRow->GetColumn($strAliasName))) {
            if ($blnExpanded) {
                $objToReturn->_objBackgroundProcessUpdateArray[] = BackgroundProcessUpdate::InstantiateDbRow($objDbRow, $strAliasPrefix . 'backgroundprocessupdate__', $objExpansionNode, null, $strColumnAliasArray);
            } elseif (is_null($objToReturn->_objBackgroundProcessUpdate)) {
                $objToReturn->_objBackgroundProcessUpdate = BackgroundProcessUpdate::InstantiateDbRow($objDbRow, $strAliasPrefix . 'backgroundprocessupdate__', $objExpansionNode, null, $strColumnAliasArray);
            }
        }

        return $objToReturn;
    }

    /**
     * Instantiate an array of BackgroundProcesses from a Database Result
     * @param DatabaseResultBase $objDbResult
     * @param dxQueryBaseNode $objExpandAsArrayNode
     * @param string[] $strColumnAliasArray
     * @return BackgroundProcess[]
     */
    public static function InstantiateDbResult(dxDatabaseResultBase $objDbResult, $objExpandAsArrayNode = null, $strColumnAliasArray = null) {
        $objToReturn = array();

        if (!$strColumnAliasArray)
            $strColumnAliasArray = array();

        // If blank resultset, then return empty array
        if (!$objDbResult)
            return $objToReturn;

        // Load up the return array with each row
        if ($objExpandAsArrayNode) {
            $objToReturn = array();
            $objPrevItemArray = array();
            while ($objDbRow = $objDbResult->GetNextRow()) {
                $objItem = BackgroundProcess::InstantiateDbRow($objDbRow, null, $objExpandAsArrayNode, $objPrevItemArray, $strColumnAliasArray);
                if ($objItem) {
                    $objToReturn[] = $objItem;
                    $objPrevItemArray[$objItem->intId][] = $objItem;
                }
            }
        } else {
            while ($objDbRow = $objDbResult->GetNextRow())
                $objToReturn[] = BackgroundProcess::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
        }

        return $objToReturn;
    }


    /**
     * Instantiate a single BackgroundProcess object from a query cursor (e.g. a DB ResultSet).
     * Cursor is automatically moved to the "next row" of the result set.
     * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
     * @param dxDatabaseResultBase $objDbResult cursor resource
     * @return BackgroundProcess next row resulting from the query
     */
    public static function InstantiateCursor(dxDatabaseResultBase $objDbResult) {
        // If blank resultset, then return empty result
        if (!$objDbResult) return null;

        // If empty resultset, then return empty result
        $objDbRow = $objDbResult->GetNextRow();
        if (!$objDbRow) return null;

        // We need the Column Aliases
        $strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
        if (!$strColumnAliasArray) $strColumnAliasArray = array();

        // Pull Expansions
        $objExpandAsArrayNode = $objDbResult->QueryBuilder->ExpandAsArrayNode;
        if (!empty ($objExpandAsArrayNode)) {
            throw new dxCallerException ("Cannot use InstantiateCursor with ExpandAsArray");
        }

        // Load up the return result with a row and return it
        return BackgroundProcess::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
    }

    ///////////////////////////////////////////////////
    // INDEX-BASED LOAD METHODS (Single Load and Array)
    ///////////////////////////////////////////////////

    /**
     * Load a single BackgroundProcess object,
     * by Id Index(es)
     * @param integer $intId
     * @param dxQueryClause[] $objOptionalClauses additional optional dxQueryClause objects for this query
     * @return BackgroundProcess
    */
    public static function LoadById($intId, $objOptionalClauses = null) {
        return BackgroundProcess::QuerySingle(
            dxQuery::AndCondition(
                dxQuery::Equal(dxQueryN::BackgroundProcess()->Id, $intId)
            ),
            $objOptionalClauses
        );
    }
    ////////////////////////////////////////////////////
    // INDEX-BASED LOAD METHODS (Array via Many to Many)
    ////////////////////////////////////////////////////


    //////////////////////////
    // SAVE, DELETE AND RELOAD
    //////////////////////////

    /**
    * Save this BackgroundProcess
    * @param bool $blnForceInsert
    * @param bool $blnForceUpdate
    * @return int
    */
    public function Save($blnForceInsert = false, $blnForceUpdate = false) {
        $ObjectAccessArray = ProjectAccessManager::getObjectAccess(ProjectFunctions::getCurrentAccountId(),"BackgroundProcess",$this->intId);
        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();
        $mixToReturn = null;
        if (!is_numeric($this->intObjectOwner)) {
            $this->intObjectOwner = ProjectFunctions::getCurrentAccountId();
        }
        $ExistingObj = BackgroundProcess::Load($this->intId);
        $newAuditLogEntry = new AuditLogEntry();
        $ChangedArray = array();
        $newAuditLogEntry->EntryTimeStamp = dxDateTime::Now();
        $newAuditLogEntry->ObjectId = $this->intId;
        $newAuditLogEntry->ObjectName = 'BackgroundProcess';
        $newAuditLogEntry->UserEmail = ProjectFunctions::getCurrentUserEmailForAudit();
        if (!$ExistingObj) {
            $newAuditLogEntry->ModificationType = 'Create';
            $ChangedArray = array_merge($ChangedArray,array("Id" => $this->intId));
            $ChangedArray = array_merge($ChangedArray,array("PId" => $this->strPId));
            $ChangedArray = array_merge($ChangedArray,array("UserId" => $this->strUserId));
            $ChangedArray = array_merge($ChangedArray,array("UpdateDateTime" => $this->dttUpdateDateTime));
            $ChangedArray = array_merge($ChangedArray,array("Status" => $this->strStatus));
            $ChangedArray = array_merge($ChangedArray,array("Summary" => $this->strSummary));
            $ChangedArray = array_merge($ChangedArray,array("StartDateTime" => $this->dttStartDateTime));
            $ChangedArray = array_merge($ChangedArray,array("LastUpdated" => $this->strLastUpdated));
            $ChangedArray = array_merge($ChangedArray,array("ObjectOwner" => $this->intObjectOwner));
            $newAuditLogEntry->AuditLogEntryDetail = json_encode($ChangedArray);
        } else {
            $newAuditLogEntry->ModificationType = 'Update';
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->Id)) {
                $ExistingValueStr = $ExistingObj->Id;
            }
            if ($ExistingObj->Id != $this->intId) {
                $ChangedArray = array_merge($ChangedArray,array("Id" => array("Before" => $ExistingValueStr,"After" => $this->intId)));
                //$ChangedArray = array_merge($ChangedArray,array("Id" => "From: ".$ExistingValueStr." to: ".$this->intId));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->PId)) {
                $ExistingValueStr = $ExistingObj->PId;
            }
            if ($ExistingObj->PId != $this->strPId) {
                $ChangedArray = array_merge($ChangedArray,array("PId" => array("Before" => $ExistingValueStr,"After" => $this->strPId)));
                //$ChangedArray = array_merge($ChangedArray,array("PId" => "From: ".$ExistingValueStr." to: ".$this->strPId));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->UserId)) {
                $ExistingValueStr = $ExistingObj->UserId;
            }
            if ($ExistingObj->UserId != $this->strUserId) {
                $ChangedArray = array_merge($ChangedArray,array("UserId" => array("Before" => $ExistingValueStr,"After" => $this->strUserId)));
                //$ChangedArray = array_merge($ChangedArray,array("UserId" => "From: ".$ExistingValueStr." to: ".$this->strUserId));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->UpdateDateTime)) {
                $ExistingValueStr = $ExistingObj->UpdateDateTime;
            }
            if ($ExistingObj->UpdateDateTime != $this->dttUpdateDateTime) {
                $ChangedArray = array_merge($ChangedArray,array("UpdateDateTime" => array("Before" => $ExistingValueStr,"After" => $this->dttUpdateDateTime)));
                //$ChangedArray = array_merge($ChangedArray,array("UpdateDateTime" => "From: ".$ExistingValueStr." to: ".$this->dttUpdateDateTime));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->Status)) {
                $ExistingValueStr = $ExistingObj->Status;
            }
            if ($ExistingObj->Status != $this->strStatus) {
                $ChangedArray = array_merge($ChangedArray,array("Status" => array("Before" => $ExistingValueStr,"After" => $this->strStatus)));
                //$ChangedArray = array_merge($ChangedArray,array("Status" => "From: ".$ExistingValueStr." to: ".$this->strStatus));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->Summary)) {
                $ExistingValueStr = $ExistingObj->Summary;
            }
            if ($ExistingObj->Summary != $this->strSummary) {
                $ChangedArray = array_merge($ChangedArray,array("Summary" => array("Before" => $ExistingValueStr,"After" => $this->strSummary)));
                //$ChangedArray = array_merge($ChangedArray,array("Summary" => "From: ".$ExistingValueStr." to: ".$this->strSummary));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->StartDateTime)) {
                $ExistingValueStr = $ExistingObj->StartDateTime;
            }
            if ($ExistingObj->StartDateTime != $this->dttStartDateTime) {
                $ChangedArray = array_merge($ChangedArray,array("StartDateTime" => array("Before" => $ExistingValueStr,"After" => $this->dttStartDateTime)));
                //$ChangedArray = array_merge($ChangedArray,array("StartDateTime" => "From: ".$ExistingValueStr." to: ".$this->dttStartDateTime));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->LastUpdated)) {
                $ExistingValueStr = $ExistingObj->LastUpdated;
            }
            if ($ExistingObj->LastUpdated != $this->strLastUpdated) {
                $ChangedArray = array_merge($ChangedArray,array("LastUpdated" => array("Before" => $ExistingValueStr,"After" => $this->strLastUpdated)));
                //$ChangedArray = array_merge($ChangedArray,array("LastUpdated" => "From: ".$ExistingValueStr." to: ".$this->strLastUpdated));
            }
            $ExistingValueStr = "NULL";
            if (!is_null($ExistingObj->ObjectOwner)) {
                $ExistingValueStr = $ExistingObj->ObjectOwner;
            }
            if ($ExistingObj->ObjectOwner != $this->intObjectOwner) {
                $ChangedArray = array_merge($ChangedArray,array("ObjectOwner" => array("Before" => $ExistingValueStr,"After" => $this->intObjectOwner)));
                //$ChangedArray = array_merge($ChangedArray,array("ObjectOwner" => "From: ".$ExistingValueStr." to: ".$this->intObjectOwner));
            }
            $newAuditLogEntry->AuditLogEntryDetail = json_encode($ChangedArray);
        }
        try {
            if ((!$this->__blnRestored) || ($blnForceInsert)) {
                if (!in_array(AccessOperation::CREATE_STR,$ObjectAccessArray)) {
                    // This user is not allowed to create an object of this type
                    throw new Exception("User is not allowed to perform operation ".AccessOperation::CREATE_STR." on entity of type 'BackgroundProcess'. Allowed access is ".json_encode($ObjectAccessArray));
                }
                // Perform an INSERT query
                $objDatabase->NonQuery('
                INSERT INTO `BackgroundProcess` (
							`PId`,
							`UserId`,
							`UpdateDateTime`,
							`Status`,
							`Summary`,
							`StartDateTime`,
							`ObjectOwner`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strPId) . ',
							' . $objDatabase->SqlVariable($this->strUserId) . ',
							' . $objDatabase->SqlVariable($this->dttUpdateDateTime) . ',
							' . $objDatabase->SqlVariable($this->strStatus) . ',
							' . $objDatabase->SqlVariable($this->strSummary) . ',
							' . $objDatabase->SqlVariable($this->dttStartDateTime) . ',
							' . $objDatabase->SqlVariable($this->intObjectOwner) . '
						)
                ');
					// Update Identity column and return its value
                $mixToReturn = $this->intId = $objDatabase->InsertId('BackgroundProcess', 'Id');
            } else {
                // Perform an UPDATE query
                // First checking for Optimistic Locking constraints (if applicable)
                if (!in_array(AccessOperation::UPDATE_STR,$ObjectAccessArray)) {
                    // This user is not allowed to create an object of this type
                    throw new Exception("User is not allowed to perform operation ".AccessOperation::UPDATE_STR." on entity of type 'BackgroundProcess'. Allowed access is ".json_encode($ObjectAccessArray));
                }
                if (!$blnForceUpdate) {
                    // Perform the Optimistic Locking check
                    $objResult = $objDatabase->Query('
                    SELECT `LastUpdated` FROM `BackgroundProcess` WHERE
							`Id` = ' . $objDatabase->SqlVariable($this->intId) . '');

                $objRow = $objResult->FetchArray();
                if ($objRow[0] != $this->strLastUpdated)
                    throw new dxOptimisticLockingException('BackgroundProcess');
            }

            // Perform the UPDATE query
            $objDatabase->NonQuery('
            UPDATE `BackgroundProcess` SET
							`PId` = ' . $objDatabase->SqlVariable($this->strPId) . ',
							`UserId` = ' . $objDatabase->SqlVariable($this->strUserId) . ',
							`UpdateDateTime` = ' . $objDatabase->SqlVariable($this->dttUpdateDateTime) . ',
							`Status` = ' . $objDatabase->SqlVariable($this->strStatus) . ',
							`Summary` = ' . $objDatabase->SqlVariable($this->strSummary) . ',
							`StartDateTime` = ' . $objDatabase->SqlVariable($this->dttStartDateTime) . ',
							`ObjectOwner` = ' . $objDatabase->SqlVariable($this->intObjectOwner) . '
            WHERE
							`Id` = ' . $objDatabase->SqlVariable($this->intId) . '');
            }

        } catch (dxCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
        try {
            $newAuditLogEntry->ObjectId = $this->intId;
            $newAuditLogEntry->Save();
        } catch(dxCallerException $e) {
            error_log('Could not save audit log while saving BackgroundProcess. Details: '.$newAuditLogEntry->getJson().'<br>Error details: '.$e->getMessage());
        }
        // Update __blnRestored and any Non-Identity PK Columns (if applicable)
        $this->__blnRestored = true;

        // Update Local Timestamp
        $objResult = $objDatabase->Query('SELECT `LastUpdated` FROM
                                            `BackgroundProcess` WHERE
                							`Id` = ' . $objDatabase->SqlVariable($this->intId) . '');

        $objRow = $objResult->FetchArray();
        $this->strLastUpdated = $objRow[0];

        $this->DeleteCache();

        // Return
        return $mixToReturn;
    }
    /**
     * Delete this BackgroundProcess
     * @return void
     */
    public function Delete() {
        if ((is_null($this->intId)))
            throw new dxUndefinedPrimaryKeyException('Cannot delete this BackgroundProcess with an unset primary key.');

        $ObjectAccessArray = ProjectAccessManager::getObjectAccess(ProjectFunctions::getCurrentAccountId(),"BackgroundProcess",$this->intId);
        if (!in_array(AccessOperation::DELETE_STR,$ObjectAccessArray)) {
            // This user is not allowed to delete an object of this type
            throw new Exception("User is not allowed to perform operation ".AccessOperation::DELETE_STR." on entity of type 'BackgroundProcess'. Allowed access is ".json_encode($ObjectAccessArray));
        }

        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();
        $newAuditLogEntry = new AuditLogEntry();
        $ChangedArray = array();
        $newAuditLogEntry->EntryTimeStamp = dxDateTime::Now();
        $newAuditLogEntry->ObjectId = $this->intId;
        $newAuditLogEntry->ObjectName = 'BackgroundProcess';
        $newAuditLogEntry->UserEmail = ProjectFunctions::getCurrentUserEmailForAudit();
        $newAuditLogEntry->ModificationType = 'Delete';
        $ChangedArray = array_merge($ChangedArray,array("Id" => $this->intId));
        $ChangedArray = array_merge($ChangedArray,array("PId" => $this->strPId));
        $ChangedArray = array_merge($ChangedArray,array("UserId" => $this->strUserId));
        $ChangedArray = array_merge($ChangedArray,array("UpdateDateTime" => $this->dttUpdateDateTime));
        $ChangedArray = array_merge($ChangedArray,array("Status" => $this->strStatus));
        $ChangedArray = array_merge($ChangedArray,array("Summary" => $this->strSummary));
        $ChangedArray = array_merge($ChangedArray,array("StartDateTime" => $this->dttStartDateTime));
        $ChangedArray = array_merge($ChangedArray,array("LastUpdated" => $this->strLastUpdated));
        $ChangedArray = array_merge($ChangedArray,array("ObjectOwner" => $this->intObjectOwner));
        $newAuditLogEntry->AuditLogEntryDetail = json_encode($ChangedArray);
        try {
            $newAuditLogEntry->Save();
        } catch(dxCallerException $e) {
            error_log('Could not save audit log while deleting BackgroundProcess. Details: '.$newAuditLogEntry->getJson().'<br>Error details: '.$e->getMessage());
        }

        // Perform the SQL Query
        $objDatabase->NonQuery('
            DELETE FROM
                `BackgroundProcess`
            WHERE
                `Id` = ' . $objDatabase->SqlVariable($this->intId) . '');

        $this->DeleteCache();
    }

    /**
     * Delete this BackgroundProcess ONLY from the cache
     * @return void
     */
    public function DeleteCache() {
        if (ProjectFunctions::$objCacheProvider && ProjectFunctions::$Database[1]->Caching) {
            $strCacheKey = ProjectFunctions::$objCacheProvider->CreateKey(ProjectFunctions::$Database[1]->Database, 'BackgroundProcess', $this->intId);
            ProjectFunctions::$objCacheProvider->Delete($strCacheKey);
        }
    }

    /**
     * Delete all BackgroundProcesses
     * @return void
     */
    public static function DeleteAll() {
        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Perform the Query
        $objDatabase->NonQuery('
            DELETE FROM
                `BackgroundProcess`');

        if (ProjectFunctions::$objCacheProvider && ProjectFunctions::$Database[1]->Caching) {
            ProjectFunctions::$objCacheProvider->DeleteAll();
        }
    }

    /**
     * Truncate BackgroundProcess table
     * @return void
     */
    public static function Truncate() {
        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Perform the Query
        $objDatabase->NonQuery('
            TRUNCATE `BackgroundProcess`');

        if (ProjectFunctions::$objCacheProvider && ProjectFunctions::$Database[1]->Caching) {
            ProjectFunctions::$objCacheProvider->DeleteAll();
        }
    }
    /**
     * Reload this BackgroundProcess from the database.
     * @return void
     */
    public function Reload() {
        // Make sure we are actually Restored from the database
        if (!$this->__blnRestored)
            throw new dxCallerException('Cannot call Reload() on a new, unsaved BackgroundProcess object.');

        $this->DeleteCache();

        // Reload the Object
        $objReloaded = BackgroundProcess::Load($this->intId);

        // Update $this's local variables to match
        $this->strPId = $objReloaded->strPId;
        $this->strUserId = $objReloaded->strUserId;
        $this->dttUpdateDateTime = $objReloaded->dttUpdateDateTime;
        $this->strStatus = $objReloaded->strStatus;
        $this->strSummary = $objReloaded->strSummary;
        $this->dttStartDateTime = $objReloaded->dttStartDateTime;
        $this->strLastUpdated = $objReloaded->strLastUpdated;
        $this->intObjectOwner = $objReloaded->intObjectOwner;
    }
    ////////////////////
    // PUBLIC OVERRIDERS
    ////////////////////

        /**
     * Override method to perform a property "Get"
     * This will get the value of $strName
     *
     * @param string $strName Name of the property to get
     * @return mixed
     */
    public function __get($strName) {
        switch ($strName) {
            ///////////////////
            // Member Variables
            ///////////////////
            case 'Id':
                /**
                 * Gets the value for intId (Read-Only PK)
                 * @return integer
                 */
                return $this->intId;

            case 'PId':
                /**
                 * Gets the value for strPId 
                 * @return string
                 */
                return $this->strPId;

            case 'UserId':
                /**
                 * Gets the value for strUserId 
                 * @return string
                 */
                return $this->strUserId;

            case 'UpdateDateTime':
                /**
                 * Gets the value for dttUpdateDateTime 
                 * @return dxDateTime
                 */
                return $this->dttUpdateDateTime;

            case 'Status':
                /**
                 * Gets the value for strStatus 
                 * @return string
                 */
                return $this->strStatus;

            case 'Summary':
                /**
                 * Gets the value for strSummary 
                 * @return string
                 */
                return $this->strSummary;

            case 'StartDateTime':
                /**
                 * Gets the value for dttStartDateTime 
                 * @return dxDateTime
                 */
                return $this->dttStartDateTime;

            case 'LastUpdated':
                /**
                 * Gets the value for strLastUpdated (Read-Only Timestamp)
                 * @return string
                 */
                return $this->strLastUpdated;

            case 'ObjectOwner':
                /**
                 * Gets the value for intObjectOwner 
                 * @return integer
                 */
                return $this->intObjectOwner;


            ///////////////////
            // Member Objects
            ///////////////////

            ////////////////////////////
            // Virtual Object References (Many to Many and Reverse References)
            // (If restored via a "Many-to" expansion)
            ////////////////////////////

            case '_BackgroundProcessUpdate':
                /**
                 * Gets the value for the private _objBackgroundProcessUpdate (Read-Only)
                 * if set due to an expansion on the BackgroundProcessUpdate.BackgroundProcess reverse relationship
                 * @return BackgroundProcessUpdate
                 */
                return $this->_objBackgroundProcessUpdate;

            case '_BackgroundProcessUpdateArray':
                /**
                 * Gets the value for the private _objBackgroundProcessUpdateArray (Read-Only)
                 * if set due to an ExpandAsArray on the BackgroundProcessUpdate.BackgroundProcess reverse relationship
                 * @return BackgroundProcessUpdate[]
                 */
                return $this->_objBackgroundProcessUpdateArray;


            case '__Restored':
                return $this->__blnRestored;

            default:
                try {
                    return parent::__get($strName);
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }
        /**
     * Override method to perform a property "Set"
     * This will set the property $strName to be $mixValue
     *
     * @param string $strName Name of the property to set
     * @param string $mixValue New value of the property
     * @return mixed
     */
    public function __set($strName, $mixValue) {
        switch ($strName) {
            ///////////////////
            // Member Variables
            ///////////////////
            case 'PId':
                /**
                 * Sets the value for strPId 
                 * @param string $mixValue
                 * @return string
                 */
                try {
                    return ($this->strPId = dxType::Cast($mixValue, dxType::String));
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'UserId':
                /**
                 * Sets the value for strUserId 
                 * @param string $mixValue
                 * @return string
                 */
                try {
                    return ($this->strUserId = dxType::Cast($mixValue, dxType::String));
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'UpdateDateTime':
                /**
                 * Sets the value for dttUpdateDateTime 
                 * @param dxDateTime $mixValue
                 * @return dxDateTime
                 */
                try {
                    return ($this->dttUpdateDateTime = dxType::Cast($mixValue, dxType::DateTime));
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'Status':
                /**
                 * Sets the value for strStatus 
                 * @param string $mixValue
                 * @return string
                 */
                try {
                    return ($this->strStatus = dxType::Cast($mixValue, dxType::String));
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'Summary':
                /**
                 * Sets the value for strSummary 
                 * @param string $mixValue
                 * @return string
                 */
                try {
                    return ($this->strSummary = dxType::Cast($mixValue, dxType::String));
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'StartDateTime':
                /**
                 * Sets the value for dttStartDateTime 
                 * @param dxDateTime $mixValue
                 * @return dxDateTime
                 */
                try {
                    return ($this->dttStartDateTime = dxType::Cast($mixValue, dxType::DateTime));
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }

            case 'ObjectOwner':
                /**
                 * Sets the value for intObjectOwner 
                 * @param integer $mixValue
                 * @return integer
                 */
                try {
                    return ($this->intObjectOwner = dxType::Cast($mixValue, dxType::Integer));
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }


            ///////////////////
            // Member Objects
            ///////////////////
            default:
                try {
                    return parent::__set($strName, $mixValue);
                } catch (dxCallerException $objExc) {
                    $objExc->IncrementOffset();
                    throw $objExc;
                }
        }
    }
    /**
     * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
     * @param string $strName
     * @return string
     */
    public function GetVirtualAttribute($strName) {
        if (array_key_exists($strName, $this->__strVirtualAttributeArray))
            return $this->__strVirtualAttributeArray[$strName];
        return null;
    }

    ///////////////////////////////
    // ASSOCIATED OBJECTS' METHODS
    ///////////////////////////////



    // Related Objects' Methods for BackgroundProcessUpdate
    //-------------------------------------------------------------------

    /**
     * Gets all associated BackgroundProcessUpdates as an array of BackgroundProcessUpdate objects
     * @param dxQueryClause[] $objOptionalClauses additional optional dxQueryClause objects for this query
     * @return BackgroundProcessUpdate[]
    */
    public function GetBackgroundProcessUpdateArray($objOptionalClauses = null) {
        if ((is_null($this->intId)))
            return array();

        try {
            return BackgroundProcessUpdate::LoadArrayByBackgroundProcess($this->intId, $objOptionalClauses);
        } catch (dxCallerException $objExc) {
            $objExc->IncrementOffset();
            throw $objExc;
        }
    }

    /**
     * Counts all associated BackgroundProcessUpdates
     * @return int
    */
    public function CountBackgroundProcessUpdates() {
        if ((is_null($this->intId)))
            return 0;

        return BackgroundProcessUpdate::CountByBackgroundProcess($this->intId);
    }

    /**
     * Associates a BackgroundProcessUpdate
     * @param BackgroundProcessUpdate $objBackgroundProcessUpdate
     * @return void
    */
    public function AssociateBackgroundProcessUpdate(BackgroundProcessUpdate $objBackgroundProcessUpdate) {
        if ((is_null($this->intId)))
            throw new dxUndefinedPrimaryKeyException('Unable to call AssociateBackgroundProcessUpdate on this unsaved BackgroundProcess.');
        if ((is_null($objBackgroundProcessUpdate->Id)))
            throw new dxUndefinedPrimaryKeyException('Unable to call AssociateBackgroundProcessUpdate on this BackgroundProcess with an unsaved BackgroundProcessUpdate.');

        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Perform the SQL Query
        $objDatabase->NonQuery('
            UPDATE
                `BackgroundProcessUpdate`
            SET
                `BackgroundProcess` = ' . $objDatabase->SqlVariable($this->intId) . '
            WHERE
                `Id` = ' . $objDatabase->SqlVariable($objBackgroundProcessUpdate->Id) . '
        ');
    }

    /**
     * Unassociates a BackgroundProcessUpdate
     * @param BackgroundProcessUpdate $objBackgroundProcessUpdate
     * @return void
    */
    public function UnassociateBackgroundProcessUpdate(BackgroundProcessUpdate $objBackgroundProcessUpdate) {
        if ((is_null($this->intId)))
            throw new dxUndefinedPrimaryKeyException('Unable to call UnassociateBackgroundProcessUpdate on this unsaved BackgroundProcess.');
        if ((is_null($objBackgroundProcessUpdate->Id)))
            throw new dxUndefinedPrimaryKeyException('Unable to call UnassociateBackgroundProcessUpdate on this BackgroundProcess with an unsaved BackgroundProcessUpdate.');

        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Perform the SQL Query
        $objDatabase->NonQuery('
            UPDATE
                `BackgroundProcessUpdate`
            SET
                `BackgroundProcess` = null
            WHERE
                `Id` = ' . $objDatabase->SqlVariable($objBackgroundProcessUpdate->Id) . ' AND
                `BackgroundProcess` = ' . $objDatabase->SqlVariable($this->intId) . '
        ');
    }

    /**
     * Unassociates all BackgroundProcessUpdates
     * @return void
    */
    public function UnassociateAllBackgroundProcessUpdates() {
        if ((is_null($this->intId)))
            throw new dxUndefinedPrimaryKeyException('Unable to call UnassociateBackgroundProcessUpdate on this unsaved BackgroundProcess.');

        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Perform the SQL Query
        $objDatabase->NonQuery('
            UPDATE
                `BackgroundProcessUpdate`
            SET
                `BackgroundProcess` = null
            WHERE
                `BackgroundProcess` = ' . $objDatabase->SqlVariable($this->intId) . '
        ');
    }

    /**
     * Deletes an associated BackgroundProcessUpdate
     * @param BackgroundProcessUpdate $objBackgroundProcessUpdate
     * @return void
    */
    public function DeleteAssociatedBackgroundProcessUpdate(BackgroundProcessUpdate $objBackgroundProcessUpdate) {
        if ((is_null($this->intId)))
            throw new dxUndefinedPrimaryKeyException('Unable to call UnassociateBackgroundProcessUpdate on this unsaved BackgroundProcess.');
        if ((is_null($objBackgroundProcessUpdate->Id)))
            throw new dxUndefinedPrimaryKeyException('Unable to call UnassociateBackgroundProcessUpdate on this BackgroundProcess with an unsaved BackgroundProcessUpdate.');

        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Perform the SQL Query
        $objDatabase->NonQuery('
            DELETE FROM
                `BackgroundProcessUpdate`
            WHERE
                `Id` = ' . $objDatabase->SqlVariable($objBackgroundProcessUpdate->Id) . ' AND
                `BackgroundProcess` = ' . $objDatabase->SqlVariable($this->intId) . '
        ');
    }

    /**
     * Deletes all associated BackgroundProcessUpdates
     * @return void
    */
    public function DeleteAllBackgroundProcessUpdates() {
        if ((is_null($this->intId)))
            throw new dxUndefinedPrimaryKeyException('Unable to call UnassociateBackgroundProcessUpdate on this unsaved BackgroundProcess.');

        // Get the Database Object for this Class
        $objDatabase = BackgroundProcess::GetDatabase();

        // Perform the SQL Query
        $objDatabase->NonQuery('
            DELETE FROM
                `BackgroundProcessUpdate`
            WHERE
                `BackgroundProcess` = ' . $objDatabase->SqlVariable($this->intId) . '
        ');
    }


    
///////////////////////////////
    // METHODS TO EXTRACT INFO ABOUT THE CLASS
    ///////////////////////////////

    /**
     * Static method to retrieve the Database object that owns this class.
     * @return string Name of the table from which this class has been created.
     */
    public static function GetTableName() {
        return "BackgroundProcess";
    }

    /**
     * Static method to retrieve the Table name from which this class has been created.
     * @return string Name of the table from which this class has been created.
     */
    public static function GetDatabaseName() {
        return ProjectFunctions::$Database[BackgroundProcess::GetDatabaseIndex()]->Database;
    }

    /**
     * Static method to retrieve the Database index in the configuration.inc.php file.
     * This can be useful when there are two databases of the same name which create
     * confusion for the developer. There are no internal uses of this function but are
     * here to help retrieve info if need be!
     * @return int position or index of the database in the config file.
     */
    public static function GetDatabaseIndex() {
        return 1;
    }

    ////////////////////////////////////////
    // METHODS for SOAP-BASED WEB SERVICES
    ////////////////////////////////////////

    public static function GetSoapComplexTypeXml() {
        $strToReturn = '<complexType name="BackgroundProcess"><sequence>';
        $strToReturn .= '<element name="Id" type="xsd:int"/>';
        $strToReturn .= '<element name="PId" type="xsd:string"/>';
        $strToReturn .= '<element name="UserId" type="xsd:string"/>';
        $strToReturn .= '<element name="UpdateDateTime" type="xsd:dateTime"/>';
        $strToReturn .= '<element name="Status" type="xsd:string"/>';
        $strToReturn .= '<element name="Summary" type="xsd:string"/>';
        $strToReturn .= '<element name="StartDateTime" type="xsd:dateTime"/>';
        $strToReturn .= '<element name="LastUpdated" type="xsd:string"/>';
        $strToReturn .= '<element name="ObjectOwner" type="xsd:int"/>';
        $strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
        $strToReturn .= '</sequence></complexType>';
        return $strToReturn;
    }

    public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
        if (!array_key_exists('BackgroundProcess', $strComplexTypeArray)) {
            $strComplexTypeArray['BackgroundProcess'] = BackgroundProcess::GetSoapComplexTypeXml();
        }
    }

    public static function GetArrayFromSoapArray($objSoapArray) {
        $objArrayToReturn = array();

        foreach ($objSoapArray as $objSoapObject)
            array_push($objArrayToReturn, BackgroundProcess::GetObjectFromSoapObject($objSoapObject));

        return $objArrayToReturn;
    }

    public static function GetObjectFromSoapObject($objSoapObject) {
        $objToReturn = new BackgroundProcess();
        if (property_exists($objSoapObject, 'Id'))
            $objToReturn->intId = $objSoapObject->Id;
        if (property_exists($objSoapObject, 'PId'))
            $objToReturn->strPId = $objSoapObject->PId;
        if (property_exists($objSoapObject, 'UserId'))
            $objToReturn->strUserId = $objSoapObject->UserId;
        if (property_exists($objSoapObject, 'UpdateDateTime'))
            $objToReturn->dttUpdateDateTime = new dxDateTime($objSoapObject->UpdateDateTime);
        if (property_exists($objSoapObject, 'Status'))
            $objToReturn->strStatus = $objSoapObject->Status;
        if (property_exists($objSoapObject, 'Summary'))
            $objToReturn->strSummary = $objSoapObject->Summary;
        if (property_exists($objSoapObject, 'StartDateTime'))
            $objToReturn->dttStartDateTime = new dxDateTime($objSoapObject->StartDateTime);
        if (property_exists($objSoapObject, 'LastUpdated'))
            $objToReturn->strLastUpdated = $objSoapObject->LastUpdated;
        if (property_exists($objSoapObject, 'ObjectOwner'))
            $objToReturn->intObjectOwner = $objSoapObject->ObjectOwner;
        if (property_exists($objSoapObject, '__blnRestored'))
            $objToReturn->__blnRestored = $objSoapObject->__blnRestored;
        return $objToReturn;
    }

    public static function GetSoapArrayFromArray($objArray) {
        if (!$objArray)
            return null;

        $objArrayToReturn = array();

        foreach ($objArray as $objObject)
            array_push($objArrayToReturn, BackgroundProcess::GetSoapObjectFromObject($objObject, true));

        return unserialize(serialize($objArrayToReturn));
    }

    public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
        if ($objObject->dttUpdateDateTime)
            $objObject->dttUpdateDateTime = $objObject->dttUpdateDateTime->qFormat(dxDateTime::FormatSoap);
        if ($objObject->dttStartDateTime)
            $objObject->dttStartDateTime = $objObject->dttStartDateTime->qFormat(dxDateTime::FormatSoap);
        return $objObject;
    }


    ////////////////////////////////////////
    // METHODS for JSON Object Translation
    ////////////////////////////////////////

    // this function is required for objects that implement the
    // IteratorAggregate interface
    public function getIterator() {
        ///////////////////
        // Member Variables
        ///////////////////
        $iArray['Id'] = $this->intId;
        $iArray['PId'] = $this->strPId;
        $iArray['UserId'] = $this->strUserId;
        $iArray['UpdateDateTime'] = $this->dttUpdateDateTime;
        $iArray['Status'] = $this->strStatus;
        $iArray['Summary'] = $this->strSummary;
        $iArray['StartDateTime'] = $this->dttStartDateTime;
        $iArray['LastUpdated'] = $this->strLastUpdated;
        $iArray['ObjectOwner'] = $this->intObjectOwner;
        return new ArrayIterator($iArray);
    }

    // this function returns a Json formatted string using the
    // IteratorAggregate interface
    public function getJson() {
        return json_encode($this->getIterator());
    }

    /**
     * Default "toJsObject" handler
     * Specifies how the object should be displayed in JQuery UI lists and menus. Note that these lists use
     * value and label differently.
     *
     * value 	= The short form of what to display in the list and selection.
     * label 	= [optional] If defined, is what is displayed in the menu
     * id 		= Primary key of object.
     *
     * @return an array that specifies how to display the object
     */
    public function toJsObject () {
        return JavaScriptHelper::toJsObject(array('value' => $this->__toString(), 'id' =>  $this->intId ));
    }


}

/////////////////////////////////////
	// ADDITIONAL CLASSES for DIVBLOX QUERY
	/////////////////////////////////////

    /**
     * @uses dxQueryNode
     *
     * @property-read dxQueryNode $Id
     * @property-read dxQueryNode $PId
     * @property-read dxQueryNode $UserId
     * @property-read dxQueryNode $UpdateDateTime
     * @property-read dxQueryNode $Status
     * @property-read dxQueryNode $Summary
     * @property-read dxQueryNode $StartDateTime
     * @property-read dxQueryNode $LastUpdated
     * @property-read dxQueryNode $ObjectOwner
     *
     *
     * @property-read dxQueryReverseReferenceNodeBackgroundProcessUpdate $BackgroundProcessUpdate

     * @property-read dxQueryNode $_PrimaryKeyNode
     **/
	class dxQueryNodeBackgroundProcess extends dxQueryNode {
		protected $strTableName = 'BackgroundProcess';
		protected $strPrimaryKey = 'Id';
		protected $strClassName = 'BackgroundProcess';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new dxQueryNode('Id', 'Id', 'Integer', $this);
				case 'PId':
					return new dxQueryNode('PId', 'PId', 'VarChar', $this);
				case 'UserId':
					return new dxQueryNode('UserId', 'UserId', 'VarChar', $this);
				case 'UpdateDateTime':
					return new dxQueryNode('UpdateDateTime', 'UpdateDateTime', 'DateTime', $this);
				case 'Status':
					return new dxQueryNode('Status', 'Status', 'VarChar', $this);
				case 'Summary':
					return new dxQueryNode('Summary', 'Summary', 'Blob', $this);
				case 'StartDateTime':
					return new dxQueryNode('StartDateTime', 'StartDateTime', 'DateTime', $this);
				case 'LastUpdated':
					return new dxQueryNode('LastUpdated', 'LastUpdated', 'VarChar', $this);
				case 'ObjectOwner':
					return new dxQueryNode('ObjectOwner', 'ObjectOwner', 'Integer', $this);
				case 'BackgroundProcessUpdate':
					return new dxQueryReverseReferenceNodeBackgroundProcessUpdate($this, 'backgroundprocessupdate', 'reverse_reference', 'BackgroundProcess', 'BackgroundProcessUpdate');

				case '_PrimaryKeyNode':
					return new dxQueryNode('Id', 'Id', 'Integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (dxCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

    /**
     * @property-read dxQueryNode $Id
     * @property-read dxQueryNode $PId
     * @property-read dxQueryNode $UserId
     * @property-read dxQueryNode $UpdateDateTime
     * @property-read dxQueryNode $Status
     * @property-read dxQueryNode $Summary
     * @property-read dxQueryNode $StartDateTime
     * @property-read dxQueryNode $LastUpdated
     * @property-read dxQueryNode $ObjectOwner
     *
     *
     * @property-read dxQueryReverseReferenceNodeBackgroundProcessUpdate $BackgroundProcessUpdate

     * @property-read dxQueryNode $_PrimaryKeyNode
     **/
	class dxQueryReverseReferenceNodeBackgroundProcess extends dxQueryReverseReferenceNode {
		protected $strTableName = 'BackgroundProcess';
		protected $strPrimaryKey = 'Id';
		protected $strClassName = 'BackgroundProcess';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new dxQueryNode('Id', 'Id', 'integer', $this);
				case 'PId':
					return new dxQueryNode('PId', 'PId', 'string', $this);
				case 'UserId':
					return new dxQueryNode('UserId', 'UserId', 'string', $this);
				case 'UpdateDateTime':
					return new dxQueryNode('UpdateDateTime', 'UpdateDateTime', 'dxDateTime', $this);
				case 'Status':
					return new dxQueryNode('Status', 'Status', 'string', $this);
				case 'Summary':
					return new dxQueryNode('Summary', 'Summary', 'string', $this);
				case 'StartDateTime':
					return new dxQueryNode('StartDateTime', 'StartDateTime', 'dxDateTime', $this);
				case 'LastUpdated':
					return new dxQueryNode('LastUpdated', 'LastUpdated', 'string', $this);
				case 'ObjectOwner':
					return new dxQueryNode('ObjectOwner', 'ObjectOwner', 'integer', $this);
				case 'BackgroundProcessUpdate':
					return new dxQueryReverseReferenceNodeBackgroundProcessUpdate($this, 'backgroundprocessupdate', 'reverse_reference', 'BackgroundProcess', 'BackgroundProcessUpdate');

				case '_PrimaryKeyNode':
					return new dxQueryNode('Id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (dxCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
?>
