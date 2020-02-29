PROGRAM PrintHello(INPUT, OUTPUT);
USES DOS, QuerryString;

VAR
  ResultString: STRING;

BEGIN {PrintHello}
  Converting(GetEnv('QUERY_STRING'));
  WRITELN('Content-Type: text/plain');
  WRITELN;
  ResultString := 'Hello Anonymous!';
  IF (ExistKey('name'))
  THEN
    ResultString := 'Hello dear, ' + GetQueryStringParameter('name') + '!';
  WRITELN(ResultString);
END. {PrintHello}