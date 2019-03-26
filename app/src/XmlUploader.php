<?php

namespace App\src;

class XmlUploader
{
    protected $request;

    protected $content;

    const ERROR_NO_PAYLOAD_PROVIDED = 'XML file not provided.';
    const ERROR_XML_FORMAT_ERROR = 'Provided file is not valid';

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function uploadXml()
    {
        if (!$this->request->hasFile('payload')) {
            return XmlUploader::returnError(XmlUploader::ERROR_NO_PAYLOAD_PROVIDED);
        }

        $content = file_get_contents($this->request->file('payload'));


        if (!$this->checkFormating($content)) {
            return XmlUploader::returnError(XmlUploader::ERROR_XML_FORMAT_ERROR);
        }

        return (new XmlProcessor($content))->processXML();

    }

    public static function returnError($message)
    {
        return response()->json(['error' => $message], 400);
    }

    private function checkFormating($fileContent)
    {
        //FOrmat checker placeholder; Todo: do proper xml format schema checker, no BS allowed past this point
        if (trim(strtok($fileContent, "\n")) != '<?xml version="1.0" encoding="UTF-8"?>') {
            return 0;
        }

        return 1;
    }
}