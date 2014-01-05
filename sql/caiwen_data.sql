# add admin user
INSERT INTO `user` (`username`, `password`, `email`, `role`)
  VALUES ('admin', '9281afa7e293ed50310dc6b1639352edc6289631', 'admin@caiwen.org', 0);

# add user
INSERT INTO `user` (`username`, `password`, `email`, `role`)
  VALUES ('wnp', '9281afa7e293ed50310dc6b1639352edc6289631', 'wnp@caiwen.org', 1);
INSERT INTO `user` (`username`, `password`, `email`, `role`)
  VALUES ('ws', '9281afa7e293ed50310dc6b1639352edc6289631', 'ws@caiwen.org', 1);

# add album
INSERT INTO `album` (`album_id`, `title`) VALUES ('1', '白菜病害');
INSERT INTO `album` (`album_id`, `title`) VALUES ('2', '白菜虫害');
INSERT INTO `album` (`album_id`, `title`) VALUES ('3', '杂草识别');
