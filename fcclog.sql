CREATE TABLE fcclog (
  timestamp datetime NOT NULL,
  showtime varchar(12) DEFAULT NULL,
  dj varchar(35) NOT NULL,
  pa_volts float(11) DEFAULT NULL,
  pa_amps float(11) DEFAULT NULL,
  fwrd_pwr float(11) DEFAULT NULL,
  readings tinyint(1) NOT NULL,
  r_zero varchar(30) DEFAULT NULL,
  r_twelve varchar(30) DEFAULT NULL,
  r_twentynine varchar(30) DEFAULT NULL,
  r_fortysix varchar(30) DEFAULT NULL,
  r_fiftyfive varchar(30) DEFAULT NULL,
  notes varchar(100) DEFAULT NULL,
  studentID int(7) NOT NULL,
  digital_signature varchar(35) DEFAULT NULL,
  foreign key (studentID) references dj(s_ID)
);

create table dj (
    s_ID int(7) NOT NULL,
    first_name varchar(255) NOT NULL,
    last_name varchar(255) NOT NULL,
    show_name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    primary key (s_ID)
);

CREATE VIEW dj_fcclogs AS
SELECT timestamp,
       showtime,
       pa_volts,
       pa_amps,
       fwrd_pwr,
       readings,
       r_zero,
       r_twelve,
       r_twentynine,
       r_fortysix,
       r_fiftyfive,
       notes,
       studentID,
       digital_signature
FROM fcclog join dj on fcclog.studentID = dj.s_ID;
