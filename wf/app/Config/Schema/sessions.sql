# $Id: sessions.sql,v 1.1.1.1 2014/06/04 11:15:23 nachiketa Exp $
#
# Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
#								1785 E. Sahara Avenue, Suite 490-204
#								Las Vegas, Nevada 89104
#
# Licensed under The MIT License
# For full copyright and license information, please see the LICENSE.txt
# Redistributions of files must retain the above copyright notice.
# MIT License (http://www.opensource.org/licenses/mit-license.php)

CREATE TABLE cake_sessions (
  id varchar(255) NOT NULL default '',
  data text,
  expires int(11) default NULL,
  PRIMARY KEY  (id)
);