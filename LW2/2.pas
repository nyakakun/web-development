PROGRAM PrintHello(INPUT, OUTPUT);
USES DOS;

VAR
  QueryString, ResultString: STRING;

BEGIN {PrintHello}
  WRITELN('Content-Type: text/plain');
  WRITELN;
  QueryString := GetEnv('QUERY_STRING');
  ResultString := 'Sarah didn''t say';
  IF QueryString = 'lanterns=1'
  THEN
    ResultString := 'The british are coming by land'
  ELSE
    IF QueryString = 'lanterns=2'
    THEN
      ResultString := 'The british are coming by sea';
  WRITELN(ResultString);
END. {PrintHello}