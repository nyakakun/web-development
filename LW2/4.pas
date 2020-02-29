PROGRAM PrintHello(INPUT, OUTPUT);
USES DOS, QuerryString;

VAR
  QueryString: STRING;

BEGIN {PrintHello}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  QueryString := GetEnv('QUERY_STRING');
  Converting(QueryString);
  WRITELN('First Name: ', GetQueryStringParameter('first_name'));
  WRITELN('Last Name: ', GetQueryStringParameter('last_name'));
  WRITELN('Age: ', GetQueryStringParameter('age'))

END. {PrintHello}