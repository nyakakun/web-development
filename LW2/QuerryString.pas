UNIT QuerryString;

INTERFACE
  PROCEDURE Converting(Source: STRING);
  FUNCTION GetQueryStringParameter(Key: STRING): STRING;
  FUNCTION ExistKey(Key: STRING): BOOLEAN;

IMPLEMENTATION

VAR
  PARAMS: ARRAY OF ARRAY[0..1] OF STRING;

PROCEDURE Converting(Source: STRING);
VAR
  I: INTEGER;
  VarName: BOOLEAN;
  TempChar: CHAR;
BEGIN
  SETLENGTH(PARAMS, 1);
  VarName := TRUE;
  FOR I := 1
  TO LENGTH(Source)
  DO
    BEGIN
      TempChar := Source[I];
      IF (TempChar <> '&') AND (TempChar <> '=')
      THEN
        IF VarName
        THEN
          PARAMS[LENGTH(PARAMS) - 1][0] := PARAMS[LENGTH(PARAMS) - 1][0] + TempChar
        ELSE
          PARAMS[LENGTH(PARAMS) - 1][1] := PARAMS[LENGTH(PARAMS) - 1][1] + TempChar
      ELSE
        IF TempChar = '&'
        THEN
          BEGIN
            VarName := TRUE;
            SETLENGTH(PARAMS, LENGTH(PARAMS) + 1);
          END
        ELSE
          VarName := FALSE;
    END
END;


FUNCTION GetQueryStringParameter(Key: STRING): STRING;
VAR
  I: INTEGER;
BEGIN
  GetQueryStringParameter := '';
  FOR I := 0
  TO LENGTH(PARAMS) - 1
  DO
    IF PARAMS[I][0] = Key
    THEN
      BEGIN
        GetQueryStringParameter := PARAMS[I][1];
        BREAK;
      END
END;


FUNCTION ExistKey(Key: STRING): BOOLEAN;
VAR
  I: INTEGER;
BEGIN
  ExistKey := FALSE;
  FOR I := 0
  TO LENGTH(PARAMS) - 1
  DO
    IF PARAMS[I][0] = Key
    THEN
      BEGIN
        ExistKey := TRUE;
        BREAK;
      END
END;

BEGIN

END.