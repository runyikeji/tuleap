#!/bin/sh
# honor JAVA_HOME if defined
if [ -z "$JAVA_HOME" ]; then 
  JAVA_HOME=/usr/java/jre/bin
fi

# honor SAXON_HOME if defined
if [ -z "$SAXON_HOME" ]; then 
  SAXON_HOME=/usr/local/saxon
fi

# Determine the script location
progname=$0
scriptdir=`dirname $progname`
DOC_HOME="$scriptdir/../.."

if [ $# != 2 ]
then
    echo "Usage: xml2fo <xml file> <fo file>"
    exit 2
fi 

echo "Transforming XML file '$1' to FO file '$2' ..."
CP=${SAXON_HOME}/saxon.jar
echo Using CLASSPATH: ${CP}
${JAVA_HOME}/java -cp ${CP} com.icl.saxon.StyleSheet $1 ${DOC_HOME}/user_guide/xsl/fo/docbook.xsl > $2
echo "Done!"
