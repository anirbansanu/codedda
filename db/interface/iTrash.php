<?php
interface iTrash
{
	public function connClose();//close database connection
	public function trashInboxMail($passMail);//return 0 or 1 at a time
	public function trashSentMail($passMail);//return 0 or 1 at a time
	public function trashDraftMail($passMail);//return 0 or 1 at a time
	public function fetchAlltrashMail($fetcherMail);//return 0 or data[''] at a time
	public function fetchtrashMail($fetcherMail,$passId);//return 0 or data[''] at a time
	public function deltrashMail($passId,$passFetcherMail);//return 0 or 1 at a time
	public function setStatus($fmail,$sid);//is set return 1
	public function unsetStatus($fmail,$sid);//is unset return 0
}
?>