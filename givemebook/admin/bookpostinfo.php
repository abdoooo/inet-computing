<?php

// Global variable for table object
$bookpost = NULL;

//
// Table class for bookpost
//
class cbookpost {
	var $TableVar = 'bookpost';
	var $TableName = 'bookpost';
	var $TableType = 'TABLE';
	var $bookid;
	var $name;
	var $cata;
	var $author;
	var $publisher;
	var $info;
	var $code;
	var $pic;
	var $useremail;
	var $price;
	var $datatime;
	var $hidden;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var $ExportAll = TRUE;
	var $SendEmail; // Send email
	var $TableCustomInnerHtml; // Custom inner HTML
	var $BasicSearchKeyword; // Basic search keyword
	var $BasicSearchType; // Basic search type
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type
	var $RowType; // Row type
	var $CssClass; // CSS class
	var $CssStyle; // CSS style
	var $RowAttrs = array(); // Row custom attributes
	var $TableFilter = "";
	var $CurrentAction; // Current action
	var $UpdateConflict; // Update conflict
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message

	//
	// Table class constructor
	//
	function cbookpost() {
		global $Language;

		// bookid
		$this->bookid = new cField('bookpost', 'bookpost', 'x_bookid', 'bookid', '`bookid`', 3, -1, FALSE, '`bookid`', FALSE);
		$this->bookid->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['bookid'] =& $this->bookid;

		// name
		$this->name = new cField('bookpost', 'bookpost', 'x_name', 'name', '`name`', 200, -1, FALSE, '`name`', FALSE);
		$this->fields['name'] =& $this->name;

		// cata
		$this->cata = new cField('bookpost', 'bookpost', 'x_cata', 'cata', '`cata`', 200, -1, FALSE, '`cata`', FALSE);
		$this->fields['cata'] =& $this->cata;

		// author
		$this->author = new cField('bookpost', 'bookpost', 'x_author', 'author', '`author`', 200, -1, FALSE, '`author`', FALSE);
		$this->fields['author'] =& $this->author;

		// publisher
		$this->publisher = new cField('bookpost', 'bookpost', 'x_publisher', 'publisher', '`publisher`', 200, -1, FALSE, '`publisher`', FALSE);
		$this->fields['publisher'] =& $this->publisher;

		// info
		$this->info = new cField('bookpost', 'bookpost', 'x_info', 'info', '`info`', 201, -1, FALSE, '`info`', FALSE);
		$this->fields['info'] =& $this->info;

		// code
		$this->code = new cField('bookpost', 'bookpost', 'x_code', 'code', '`code`', 200, -1, FALSE, '`code`', FALSE);
		$this->fields['code'] =& $this->code;

		// pic
		$this->pic = new cField('bookpost', 'bookpost', 'x_pic', 'pic', '`pic`', 200, -1, FALSE, '`pic`', FALSE);
		$this->fields['pic'] =& $this->pic;

		// useremail
		$this->useremail = new cField('bookpost', 'bookpost', 'x_useremail', 'useremail', '`useremail`', 200, -1, FALSE, '`useremail`', FALSE);
		$this->fields['useremail'] =& $this->useremail;

		// price
		$this->price = new cField('bookpost', 'bookpost', 'x_price', 'price', '`price`', 3, -1, FALSE, '`price`', FALSE);
		$this->price->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['price'] =& $this->price;

		// datatime
		$this->datatime = new cField('bookpost', 'bookpost', 'x_datatime', 'datatime', '`datatime`', 135, 5, FALSE, '`datatime`', FALSE);
		$this->datatime->FldDefaultErrMsg = str_replace("%s", "/", $Language->Phrase("IncorrectDateYMD"));
		$this->fields['datatime'] =& $this->datatime;

		// hidden
		$this->hidden = new cField('bookpost', 'bookpost', 'x_hidden', 'hidden', '`hidden`', 3, -1, FALSE, '`hidden`', FALSE);
		$this->hidden->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['hidden'] =& $this->hidden;
	}

	// Table caption
	function TableCaption() {
		global $Language;
		return $Language->TablePhrase($this->TableVar, "TblCaption");
	}

	// Page caption
	function PageCaption($Page) {
		global $Language;
		$Caption = $Language->TablePhrase($this->TableVar, "TblPageCaption" . $Page);
		if ($Caption == "") $Caption = "Page " . $Page;
		return $Caption;
	}

	// Export return page
	function ExportReturnUrl() {
		$url = @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_EXPORT_RETURN_URL];
		return ($url <> "") ? $url : ew_CurrentPage();
	}

	function setExportReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_EXPORT_RETURN_URL] = $v;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC] = $v;
	}

	// Search highlight name
	function HighlightName() {
		return "bookpost_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search keyword
	function getSessionBasicSearchKeyword() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH];
	}

	function setSessionBasicSearchKeyword($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic search type
	function getSessionBasicSearchType() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE];
	}

	function setSessionBasicSearchType($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search WHERE clause
	function getSearchWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE] = $v;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Session WHERE clause
	function getSessionWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY];
	}

	function setSessionOrderBy($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY] = $v;
	}

	// Session key
	function getKey($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlFrom() { // From
		return "`bookpost`";
	}

	function SqlSelect() { // Select
		return "SELECT * FROM " . $this->SqlFrom();
	}

	function SqlWhere() { // Where
		$sWhere = "";
		$this->TableFilter = "";
		if ($this->TableFilter <> "") {
			if ($sWhere <> "") $sWhere .= "(" . $sWhere . ") AND (";
			$sWhere .= "(" . $this->TableFilter . ")";
		}
		return $sWhere;
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
	}

	// Check if Anonymous User is allowed
	function AllowAnonymousUser() {
		switch (EW_PAGE_ID) {
			case "add":
			case "register":
			case "addopt":
				return FALSE;
			case "edit":
			case "update":
				return FALSE;
			case "delete":
				return FALSE;
			case "view":
				return FALSE;
			case "search":
				return FALSE;
			default:
				return FALSE;
		}
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		return $sFilter;
	}

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Table SQL with List page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		if ($this->CurrentFilter <> "") {
			if ($sFilter <> "") $sFilter = "(" . $sFilter . ") AND ";
			$sFilter .= "(" . $this->CurrentFilter . ")";
		}
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(), $this->SqlGroupBy(),
			$this->SqlHaving(), $this->SqlOrderBy(), $sFilter, $sSort);
	}

	// Try to get record count
	function TryGetRecordCount($sSql) {
		global $conn;
		$cnt = -1;
		if ($this->TableType == 'TABLE' || $this->TableType == 'VIEW') {
			$sSql = "SELECT COUNT(*) FROM" . substr($sSql, 13);
		} else {
			$sSql = "SELECT COUNT(*) FROM (" . $sSql . ") EW_COUNT_TABLE";
		}
		if ($rs = $conn->Execute($sSql)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// Get record count based on filter (for detail record count in master table pages)
	function LoadRecordCount($sFilter) {
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $sFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $this->LoadRs($this->CurrentFilter)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Get record count (for current List page)
	function SelectRecordCount() {
		global $conn;
		$origFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$sSql = $this->SelectSQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		global $conn;
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `bookpost` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		global $conn;
		$SQL = "UPDATE `bookpost` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=";
			$SQL .= ew_QuotedValue($value, $this->fields[$name]->FldDataType) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `bookpost` WHERE ";
		$SQL .= ew_QuotedName('bookid') . '=' . ew_QuotedValue($rs['bookid'], $this->bookid->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`bookid` = @bookid@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->bookid->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@bookid@", ew_AdjustSql($this->bookid->CurrentValue), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return page URL
	function getReturnUrl() {
		$name = EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "bookpostlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function ListUrl() {
		return "bookpostlist.php";
	}

	// View URL
	function ViewUrl() {
		return $this->KeyUrl("bookpostview.php", $this->UrlParm());
	}

	// Add URL
	function AddUrl() {
		$AddUrl = "bookpostadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit URL
	function EditUrl() {
		return $this->KeyUrl("bookpostedit.php", $this->UrlParm());
	}

	// Inline edit URL
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy URL
	function CopyUrl() {
		return $this->KeyUrl("bookpostadd.php", $this->UrlParm());
	}

	// Inline copy URL
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete URL
	function DeleteUrl() {
		return $this->KeyUrl("bookpostdelete.php", $this->UrlParm());
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->bookid->CurrentValue)) {
			$sUrl .= "bookid=" . urlencode($this->bookid->CurrentValue);
		} else {
			return "javascript:alert(ewLanguage.Phrase(\"InvalidRecord\"));";
		}
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Add URL parameter
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=bookpost" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Load rows based on filter
	function &LoadRs($sFilter) {
		global $conn;

		// Set up filter (SQL WHERE clause) and get return SQL
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		return $conn->Execute($sSql);
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->bookid->setDbValue($rs->fields('bookid'));
		$this->name->setDbValue($rs->fields('name'));
		$this->cata->setDbValue($rs->fields('cata'));
		$this->author->setDbValue($rs->fields('author'));
		$this->publisher->setDbValue($rs->fields('publisher'));
		$this->info->setDbValue($rs->fields('info'));
		$this->code->setDbValue($rs->fields('code'));
		$this->pic->setDbValue($rs->fields('pic'));
		$this->useremail->setDbValue($rs->fields('useremail'));
		$this->price->setDbValue($rs->fields('price'));
		$this->datatime->setDbValue($rs->fields('datatime'));
		$this->hidden->setDbValue($rs->fields('hidden'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
		// bookid

		$this->bookid->CellCssStyle = ""; $this->bookid->CellCssClass = "";
		$this->bookid->CellAttrs = array(); $this->bookid->ViewAttrs = array(); $this->bookid->EditAttrs = array();

		// name
		$this->name->CellCssStyle = ""; $this->name->CellCssClass = "";
		$this->name->CellAttrs = array(); $this->name->ViewAttrs = array(); $this->name->EditAttrs = array();

		// cata
		$this->cata->CellCssStyle = ""; $this->cata->CellCssClass = "";
		$this->cata->CellAttrs = array(); $this->cata->ViewAttrs = array(); $this->cata->EditAttrs = array();

		// author
		$this->author->CellCssStyle = ""; $this->author->CellCssClass = "";
		$this->author->CellAttrs = array(); $this->author->ViewAttrs = array(); $this->author->EditAttrs = array();

		// publisher
		$this->publisher->CellCssStyle = ""; $this->publisher->CellCssClass = "";
		$this->publisher->CellAttrs = array(); $this->publisher->ViewAttrs = array(); $this->publisher->EditAttrs = array();

		// code
		$this->code->CellCssStyle = ""; $this->code->CellCssClass = "";
		$this->code->CellAttrs = array(); $this->code->ViewAttrs = array(); $this->code->EditAttrs = array();

		// pic
		$this->pic->CellCssStyle = ""; $this->pic->CellCssClass = "";
		$this->pic->CellAttrs = array(); $this->pic->ViewAttrs = array(); $this->pic->EditAttrs = array();

		// useremail
		$this->useremail->CellCssStyle = ""; $this->useremail->CellCssClass = "";
		$this->useremail->CellAttrs = array(); $this->useremail->ViewAttrs = array(); $this->useremail->EditAttrs = array();

		// price
		$this->price->CellCssStyle = ""; $this->price->CellCssClass = "";
		$this->price->CellAttrs = array(); $this->price->ViewAttrs = array(); $this->price->EditAttrs = array();

		// datatime
		$this->datatime->CellCssStyle = ""; $this->datatime->CellCssClass = "";
		$this->datatime->CellAttrs = array(); $this->datatime->ViewAttrs = array(); $this->datatime->EditAttrs = array();

		// hidden
		$this->hidden->CellCssStyle = ""; $this->hidden->CellCssClass = "";
		$this->hidden->CellAttrs = array(); $this->hidden->ViewAttrs = array(); $this->hidden->EditAttrs = array();

		// bookid
		$this->bookid->ViewValue = $this->bookid->CurrentValue;
		$this->bookid->CssStyle = "";
		$this->bookid->CssClass = "";
		$this->bookid->ViewCustomAttributes = "";

		// name
		$this->name->ViewValue = $this->name->CurrentValue;
		$this->name->CssStyle = "";
		$this->name->CssClass = "";
		$this->name->ViewCustomAttributes = "";

		// cata
		if (strval($this->cata->CurrentValue) <> "") {
			switch ($this->cata->CurrentValue) {
				case "eng":
					$this->cata->ViewValue = "English";
					break;
				case "lan":
					$this->cata->ViewValue = "Languages";
					break;
				case "his":
					$this->cata->ViewValue = "History";
					break;
				case "acc":
					$this->cata->ViewValue = "Accounting";
					break;
				case "sci":
					$this->cata->ViewValue = "Science";
					break;
				case "com":
					$this->cata->ViewValue = "Computer";
					break;
				case "engi":
					$this->cata->ViewValue = "Engineering";
					break;
				case "mus":
					$this->cata->ViewValue = "Music";
					break;
				case "art":
					$this->cata->ViewValue = "Art";
					break;
				case "oth":
					$this->cata->ViewValue = "Other";
					break;
				default:
					$this->cata->ViewValue = $this->cata->CurrentValue;
			}
		} else {
			$this->cata->ViewValue = NULL;
		}
		$this->cata->CssStyle = "";
		$this->cata->CssClass = "";
		$this->cata->ViewCustomAttributes = "";

		// author
		$this->author->ViewValue = $this->author->CurrentValue;
		$this->author->CssStyle = "";
		$this->author->CssClass = "";
		$this->author->ViewCustomAttributes = "";

		// publisher
		$this->publisher->ViewValue = $this->publisher->CurrentValue;
		$this->publisher->CssStyle = "";
		$this->publisher->CssClass = "";
		$this->publisher->ViewCustomAttributes = "";

		// code
		$this->code->ViewValue = $this->code->CurrentValue;
		$this->code->CssStyle = "";
		$this->code->CssClass = "";
		$this->code->ViewCustomAttributes = "";

		// pic
		$this->pic->ViewValue = $this->pic->CurrentValue;
		$this->pic->CssStyle = "";
		$this->pic->CssClass = "";
		$this->pic->ViewCustomAttributes = "";

		// useremail
		$this->useremail->ViewValue = $this->useremail->CurrentValue;
		$this->useremail->CssStyle = "";
		$this->useremail->CssClass = "";
		$this->useremail->ViewCustomAttributes = "";

		// price
		$this->price->ViewValue = $this->price->CurrentValue;
		$this->price->CssStyle = "";
		$this->price->CssClass = "";
		$this->price->ViewCustomAttributes = "";

		// datatime
		$this->datatime->ViewValue = $this->datatime->CurrentValue;
		$this->datatime->ViewValue = ew_FormatDateTime($this->datatime->ViewValue, 5);
		$this->datatime->CssStyle = "";
		$this->datatime->CssClass = "";
		$this->datatime->ViewCustomAttributes = "";

		// hidden
		if (strval($this->hidden->CurrentValue) <> "") {
			switch ($this->hidden->CurrentValue) {
				case "1":
					$this->hidden->ViewValue = "Yes";
					break;
				case "0":
					$this->hidden->ViewValue = "No";
					break;
				default:
					$this->hidden->ViewValue = $this->hidden->CurrentValue;
			}
		} else {
			$this->hidden->ViewValue = NULL;
		}
		$this->hidden->CssStyle = "";
		$this->hidden->CssClass = "";
		$this->hidden->ViewCustomAttributes = "";

		// bookid
		$this->bookid->HrefValue = "";
		$this->bookid->TooltipValue = "";

		// name
		$this->name->HrefValue = "";
		$this->name->TooltipValue = "";

		// cata
		$this->cata->HrefValue = "";
		$this->cata->TooltipValue = "";

		// author
		$this->author->HrefValue = "";
		$this->author->TooltipValue = "";

		// publisher
		$this->publisher->HrefValue = "";
		$this->publisher->TooltipValue = "";

		// code
		$this->code->HrefValue = "";
		$this->code->TooltipValue = "";

		// pic
		$this->pic->HrefValue = "";
		$this->pic->TooltipValue = "";

		// useremail
		$this->useremail->HrefValue = "";
		$this->useremail->TooltipValue = "";

		// price
		$this->price->HrefValue = "";
		$this->price->TooltipValue = "";

		// datatime
		$this->datatime->HrefValue = "";
		$this->datatime->TooltipValue = "";

		// hidden
		$this->hidden->HrefValue = "";
		$this->hidden->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {
	}

	// Row styles
	function RowStyles() {
		$sAtt = "";
		$sStyle = trim($this->CssStyle);
		if (@$this->RowAttrs["style"] <> "")
			$sStyle .= " " . $this->RowAttrs["style"];
		$sClass = trim($this->CssClass);
		if (@$this->RowAttrs["class"] <> "")
			$sClass .= " " . $this->RowAttrs["class"];
		if (trim($sStyle) <> "")
			$sAtt .= " style=\"" . trim($sStyle) . "\"";
		if (trim($sClass) <> "")
			$sAtt .= " class=\"" . trim($sClass) . "\"";
		return $sAtt;
	}

	// Row attributes
	function RowAttributes() {
		$sAtt = $this->RowStyles();
		if ($this->Export == "") {
			foreach ($this->RowAttrs as $k => $v) {
				if ($k <> "class" && $k <> "style" && trim($v) <> "")
					$sAtt .= " " . $k . "=\"" . trim($v) . "\"";
			}
		}
		return $sAtt;
	}

	// Field object by name
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//global $MyTable;
		//$MyTable->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// Row Inserting event
	function Row_Inserting(&$rs) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted(&$rs) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating(&$rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated(&$rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict(&$rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
}
?>
