-- ======================================================================
-- ===   Sql Script for Database : sistema_id
-- ===
-- === Build : 157
-- ======================================================================

CREATE TABLE area
  (
    cod_are  int           not null auto_increment,
    nom_are  varchar(35)   unique not null,
    est_are  char(1)       not null,

    primary key(cod_are)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE banco
  (
    cod_ban  int           not null auto_increment,
    nom_ban  varchar(50)   not null,
    est_ban  char(1)       not null,

    primary key(cod_ban)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE contenido
  (
    cod_con  int           not null auto_increment,
    nom_con  varchar(80)   not null,
    est_con  char(1)       not null,

    primary key(cod_con)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE empresa
  (
    cod_emp  int            not null auto_increment,
    rif_emp  varchar(15)    not null,
    nom_emp  varchar(50)    not null,
    dom_emp  varchar(255)   not null,
    est_emp  char(1)        not null,

    primary key(cod_emp)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE horario
  (
    cod_hor  int           not null auto_increment,
    nom_hor  varchar(50)   not null,
    est_hor  char(1)       not null,

    primary key(cod_hor)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE iva
  (
    cod_iva  int       not null auto_increment,
    val_iva  float     not null,
    ini_iva  date      not null,
    fin_iva  date      not null,
    est_iva  char(1)   not null,

    primary key(cod_iva)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE instructor
  (
    cod_ins  int           not null auto_increment,
    ide_ins  varchar(15)   not null,
    nom_ins  varchar(25)   not null,
    ape_ins  varchar(25)   not null,
    ema_ins  varchar(80)   not null,
    te1_ins  varchar(15)   not null,
    te2_ins  varchar(15),
    est_ins  char(1)       not null,

    primary key(cod_ins)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE modulo
  (
    cod_mod  int           not null auto_increment,
    nom_mod  varchar(25)   not null,
    url_mod  text          not null,
    est_mod  char(1)       not null,

    primary key(cod_mod)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE modalidad
  (
    cod_mod  int           not null auto_increment,
    nom_mod  varchar(80)   not null,
    est_mod  char(1)       not null,

    primary key(cod_mod)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE opcion
  (
    cod_opc     int           not null auto_increment,
    nom_opc     varchar(25)   not null,
    fky_modulo  int           not null,
    url_opc     text          not null,
    est_opc     char(1)       not null,

    primary key(cod_opc),

    foreign key(fky_modulo) references modulo(cod_mod) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE pais
  (
    cod_pai  int           not null auto_increment,
    nom_pai  varchar(25)   not null,
    est_pai  char(1)       not null,

    primary key(cod_pai)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE proveedor
  (
    cod_pro  int           not null auto_increment,
    rif_pro  varchar(15)   not null,
    nom_pro  varchar(80)   not null,
    ema_pro  varchar(80)   not null,
    te1_pro  varchar(15)   not null,
    te2_pro  varchar(15)   not null,
    dir_pro  varchar(80)   not null,
    est_pro  char(1)       not null,

    primary key(cod_pro)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE quiz
  (
    cod_qui  int            not null auto_increment,
    nom_qui  varchar(255)   not null,
    tie_qui  int            not null,
    tip_qui  char(1)        not null,
    min_qui  int            not null,
    ini_qui  date           not null,
    fin_qui  date           not null,
    hor_ini  time           not null,
    hor_fin  time           not null,
    est_qui  char(1)        not null,

    primary key(cod_qui)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE rol
  (
    cod_rol  int           not null auto_increment,
    nom_rol  varchar(25)   not null,
    est_rol  char(1)       not null,

    primary key(cod_rol)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE requisito
  (
    cod_req  int           not null auto_increment,
    nom_req  varchar(80)   not null,
    est_req  char(1)       not null,

    primary key(cod_req)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE tipo_pago
  (
    cod_tip_pag  int           not null auto_increment,
    nom_tip_pag  varchar(50)   not null,
    est_tip_pag  char(1)       not null,

    primary key(cod_tip_pag)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE tipo_curso
  (
    cod_tip_cur  int            not null auto_increment,
    nom_tip_cur  varchar(50)    not null,
    hor_tip_cur  int            not null,
    cer_tip_cur  varchar(50)    not null,
    des_tip_cur  text           not null,
    obj_tip_cur  varchar(100)   not null,
    min_tip_cur  int            not null,
    max_tip_cur  int            not null,
    ava_tip_cur  char(1)        not null,
    url_tip_cur  text,
    fky_area     int            not null,
    fky_empresa  int            not null,
    est_tip_cur  char(1)        not null,

    primary key(cod_tip_cur),

    foreign key(fky_area) references area(cod_are) on update CASCADE on delete RESTRICT,
    foreign key(fky_empresa) references empresa(cod_emp) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE tipo_usuario
  (
    cod_tip_usu  int           not null auto_increment,
    nom_tip_usu  varchar(35)   not null,
    est_tip_usu  char(1)       not null,

    primary key(cod_tip_usu)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE titular_factura
  (
    cod_tit  int           not null auto_increment,
    rif_tit  varchar(15)   not null,
    nom_tit  varchar(80)   not null,
    ret_iva  char(1)       not null,
    ret_isl  char(1)       not null,
    tip_tit  char(1)       not null,
    est_tit  char(1)       not null,

    primary key(cod_tit)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE tipo_movimiento
  (
    cod_tip_mov  int           not null auto_increment,
    nom_tip_mov  varchar(25)   not null,
    acc_tip_mov  char(1)       not null,
    est_tip_mov  char(1)       not null,

    primary key(cod_tip_mov)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE tipo_solicitud
  (
    cod_tip_sol  int           not null auto_increment,
    nom_tip_sol  varchar(50)   not null,
    est_tip_sol  char(1)       not null,

    primary key(cod_tip_sol)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE solicitud
  (
    cod_sol       int            not null auto_increment,
    fky_tipo_sol  int,
    fec_sol       date           not null,
    per_sol       varchar(50)    not null,
    te1_sol       varchar(15)    not null,
    te2_sol       varchar(15)    not null,
    ema_sol       varchar(100)   not null,
    obs_sol       varchar(255)   not null,
    est_sol       char(1)        not null,

    primary key(cod_sol),

    foreign key(fky_tipo_sol) references tipo_solicitud(cod_tip_sol) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE turno
  (
    cod_tur  int           not null auto_increment,
    nom_tur  varchar(20)   not null,
    ini_tur  time          not null,
    fin_tur  time          not null,
    mer_tur  char(1)       not null,
    est_tur  char(1)       not null,

    primary key(cod_tur)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE usuario
  (
    cod_usu           int           not null auto_increment,
    log_usu           varchar(25)   unique not null,
    nom_usu           varchar(50)   not null,
    ape_usu           varchar(50)   not null,
    ema_usu           varchar(80)   unique not null,
    cla_usu           varchar(32)   not null,
    fky_tipo_usuario  int           not null,
    fky_rol           int           not null,
    est_usu           char(1)       not null,

    primary key(cod_usu),

    foreign key(fky_tipo_usuario) references tipo_usuario(cod_tip_usu) on update CASCADE on delete RESTRICT,
    foreign key(fky_rol) references rol(cod_rol) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE universidad
  (
    cod_uni  int           not null auto_increment,
    nom_uni  varchar(25)   not null,
    est_uni  char(1)       not null,

    primary key(cod_uni)
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE notificacion
  (

  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE auditoria
  (
    cod_aud      int           not null auto_increment,
    tab_aud      varchar(35)   not null,
    fec_aud      datetime      not null,
    acc_aud      varchar(20)   not null,
    prk_aud      int           not null,
    fky_usuario  varchar(25)   not null,

    primary key(cod_aud),

    foreign key(fky_usuario) references usuario(log_usu) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE carrera
  (
    cod_car          int           not null auto_increment,
    nom_car          varchar(50)   not null,
    fky_universidad  int           not null,
    fky_area         int           not null,
    est_car          char(1)       not null,

    primary key(cod_car),

    foreign key(fky_universidad) references universidad(cod_uni) on update CASCADE on delete RESTRICT,
    foreign key(fky_area) references area(cod_are) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE curso
  (
    cod_cur         int            not null auto_increment,
    fec_ini         date           not null,
    fec_fin         date           not null,
    bas_cur         float          not null,
    iva_cur         float          not null,
    pre_cur         float          not null,
    dol_cur         int            not null,
    pag_cur         float          not null,
    obs_cur         varchar(255)   not null,
    fk1_turno       int            not null,
    fk2_turno       int,
    fky_horario     int            not null,
    fky_tipo_curso  int            not null,
    fky_instructor  int            not null,
    fky_modalidad   int            not null,
    est_cur         char(1)        not null,

    primary key(cod_cur),

    foreign key(fk1_turno) references turno(cod_tur) on update CASCADE on delete RESTRICT,
    foreign key(fk2_turno) references turno(cod_tur) on update CASCADE on delete RESTRICT,
    foreign key(fky_horario) references horario(cod_hor) on update CASCADE on delete RESTRICT,
    foreign key(fky_tipo_curso) references tipo_curso(cod_tip_cur) on update CASCADE on delete RESTRICT,
    foreign key(fky_instructor) references instructor(cod_ins) on update CASCADE on delete RESTRICT,
    foreign key(fky_modalidad) references modalidad(cod_mod) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE cuenta
  (
    cod_cue      int           not null auto_increment,
    num_cue      varchar(20)   not null,
    rif_cue      varchar(15)   not null,
    nom_cue      varchar(25)   not null,
    fky_banco    int           not null,
    tip_cue      char(1)       not null,
    fky_empresa  int           not null,
    est_cue      char(1)       not null,

    primary key(cod_cue),

    foreign key(fky_banco) references banco(cod_ban) on update CASCADE on delete RESTRICT,
    foreign key(fky_empresa) references empresa(cod_emp) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE contenido_por_curso
  (
    cod_con_cur     int       not null auto_increment,
    fky_tipo_curso  int       not null,
    fky_contenido   int       not null,
    url_con_cur     text      not null,
    est_con_cur     char(1)   not null,

    primary key(cod_con_cur),

    foreign key(fky_tipo_curso) references tipo_curso(cod_tip_cur) on update CASCADE on delete RESTRICT,
    foreign key(fky_contenido) references contenido(cod_con) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE factura
  (
    num_fac              int       not null auto_increment,
    fec_fac              date      not null,
    bas_fac              float     not null,
    iva_fac              float     not null,
    tot_fac              float     not null,
    gen_fac              char(1)   not null,
    fky_iva              int       not null,
    fky_titular_factura  int       not null,
    est_fac              char(1)   not null,

    primary key(num_fac),

    foreign key(fky_iva) references iva(cod_iva) on update CASCADE on delete RESTRICT,
    foreign key(fky_titular_factura) references titular_factura(cod_tit) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE factura_detalle
  (
    fky_factura  int     not null auto_increment,
    fky_curso    int     not null,
    can_fac_det  int     not null,
    pre_fac_det  float   not null,
    iva_fac_det  float   not null,
    sub_fac_det  float   not null,

    primary key(fky_factura,fky_curso),

    foreign key(fky_factura) references factura(num_fac) on update CASCADE on delete CASCADE,
    foreign key(fky_curso) references curso(cod_cur) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE permiso
  (
    cod_per      int           not null auto_increment,
    fky_opcion   int           not null,
    fky_usuario  varchar(25)   not null,
    est_per      char(1)       not null,

    primary key(cod_per),

    foreign key(fky_opcion) references opcion(cod_opc) on update CASCADE on delete RESTRICT,
    foreign key(fky_usuario) references usuario(log_usu) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE opcion_rol
  (
    fky_opcion   int       not null auto_increment,
    fky_rol      int       not null,
    est_per_rol  char(1),

    primary key(fky_opcion,fky_rol),

    foreign key(fky_opcion) references opcion(cod_opc) on update CASCADE on delete RESTRICT,
    foreign key(fky_rol) references rol(cod_rol) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE pregunta_quiz
  (
    cod_pre_qui     int            not null auto_increment,
    enu_pre_qui     text           not null,
    res_pre_qui     varchar(255)   not null,
    re1_pre_qui     varchar(255)   not null,
    re2_pre_qui     varchar(255)   not null,
    re3_pre_qui     varchar(255)   not null,
    re4_pre_qui     varchar(255)   not null,
    tip_pre_qui     char(1)        not null,
    fky_quiz        int            not null,
    fky_contenido   int            not null,
    fky_tipo_curso  int            not null,
    est_pre_qui     char(1)        not null,

    primary key(cod_pre_qui),

    foreign key(fky_quiz) references quiz(cod_qui) on update CASCADE on delete RESTRICT,
    foreign key(fky_contenido) references contenido(cod_con) on update CASCADE on delete RESTRICT,
    foreign key(fky_tipo_curso) references tipo_curso(cod_tip_cur) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE pregunta_evaluacion_curso
  (
    cod_pre_eva     int           not null auto_increment,
    enu_pre_eva     text          not null,
    re1_pre_eva     varchar(80)   not null,
    re2_pre_eva     varchar(80)   not null,
    re3_pre_eva     varchar(80)   not null,
    re4_pre_eva     varchar(80)   not null,
    re5_pre_eva     varchar(80)   not null,
    fky_tipo_curso  int           not null,
    tip_pre_eva     char(1)       not null,
    est_pre_eva     char(1)       not null,

    primary key(cod_pre_eva),

    foreign key(fky_tipo_curso) references tipo_curso(cod_tip_cur) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE requisito_por_curso
  (
    cod_req_cur     int           not null auto_increment,
    fky_requisito   int           not null,
    fky_tipo_curso  int           not null,
    ini_req         varchar(15)   not null,
    fin_req         varchar(15)   not null,
    obl_req         char(1)       not null,
    est_req         char(1)       not null,

    primary key(cod_req_cur),

    foreign key(fky_requisito) references requisito(cod_req) on update CASCADE on delete RESTRICT,
    foreign key(fky_tipo_curso) references tipo_curso(cod_tip_cur) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE alumno
  (
    cod_alu          int           auto_increment,
    ide_alu          varchar(15)   unique not null,
    nom_alu          varchar(25)   not null,
    ape_alu          varchar(25)   not null,
    sex_alu          char(1)       not null,
    ema_alu          varchar(80)   not null,
    te1_alu          varchar(15)   not null,
    te2_alu          varchar(15),
    ins_alu          varchar(20),
    fky_pais         int           not null,
    fky_carrera      int           not null,
    fky_universidad  int,
    not_alu          char(1)       not null,
    est_alu          char(1)       not null,

    primary key(cod_alu),

    foreign key(fky_pais) references pais(cod_pai) on update CASCADE on delete RESTRICT,
    foreign key(fky_carrera) references carrera(cod_car) on update CASCADE on delete RESTRICT,
    foreign key(fky_universidad) references universidad(cod_uni) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE asistencia
  (
    cod_asi     int           not null auto_increment,
    fec_asi     date          not null,
    hor_asi     time          not null,
    fky_curso   int           not null,
    fky_alumno  varchar(15)   not null,
    est_asi     char(1)       not null,

    primary key(cod_asi),

    foreign key(fky_curso) references curso(cod_cur) on update CASCADE on delete RESTRICT,
    foreign key(fky_alumno) references alumno(ide_alu) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE falla
  (
    cod_fal     int        not null auto_increment,
    fec_fal     datetime   not null,
    lap_fal     int        not null,
    obs_fal     text       not null,
    fky_alumno  int        not null,
    est_fal     char(1)    not null,

    primary key(cod_fal),

    foreign key(fky_alumno) references alumno(cod_alu) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE inscripcion
  (
    cod_ins      int           not null auto_increment,
    fec_ins      date          not null,
    hor_ins      time          not null,
    fky_alu      varchar(15)   not null,
    fky_cur      int           not null,
    fky_factura  int           not null,
    est_ins      char(1)       not null,

    primary key(cod_ins),

    foreign key(fky_alu) references alumno(ide_alu) on update CASCADE on delete RESTRICT,
    foreign key(fky_cur) references curso(cod_cur) on update CASCADE on delete RESTRICT,
    foreign key(fky_factura) references factura(num_fac) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE pago
  (
    cod_pag              int            not null auto_increment,
    fec_pag              date           not null,
    hor_pag              time           not null,
    dep_pag              varchar(20)    not null,
    mon_pag              float          not null,
    fky_curso            int,
    fky_alumno           varchar(15),
    fky_proveedor        int,
    fky_banco_origen     int,
    fky_banco_destino    int,
    fky_tipo_pago        int            not null,
    fky_inscripcion      int,
    fky_tipo_movimiento  int            not null,
    url_pag              text,
    obs_pag              varchar(255),
    est_pag              char(1)        not null,

    primary key(cod_pag),

    foreign key(fky_curso) references curso(cod_cur) on update CASCADE on delete RESTRICT,
    foreign key(fky_alumno) references alumno(ide_alu) on update CASCADE on delete RESTRICT,
    foreign key(fky_proveedor) references proveedor(cod_pro) on update CASCADE on delete RESTRICT,
    foreign key(fky_banco_origen) references banco(cod_ban) on update CASCADE on delete RESTRICT,
    foreign key(fky_banco_destino) references banco(cod_ban) on update CASCADE on delete RESTRICT,
    foreign key(fky_tipo_pago) references tipo_pago(cod_tip_pag) on update CASCADE on delete RESTRICT,
    foreign key(fky_inscripcion) references inscripcion(cod_ins) on update CASCADE on delete RESTRICT,
    foreign key(fky_tipo_movimiento) references tipo_movimiento(cod_tip_mov) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE retiro
  (
    cod_ret    int            not null auto_increment,
    fec_ret    date           not null,
    hor_ret    time           not null,
    fky_pago   int            not null,
    mot_ret    varchar(50)    not null,
    mon_ret    float          not null,
    ide_ret    varchar(15)    not null,
    tit_ret    varchar(50)    not null,
    cue_ret    varchar(20)    not null,
    fky_banco  int            not null,
    fpa_ret    date           not null,
    obs_ret    varchar(255),
    est_ret    char(1)        not null,

    primary key(cod_ret),

    foreign key(fky_pago) references pago(cod_pag) on update CASCADE on delete RESTRICT,
    foreign key(fky_banco) references banco(cod_ban) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE respuesta_quiz_alumno
  (
    cod_quiz_alu       int           not null auto_increment,
    fec_qui_alu        datetime      not null,
    res_qui_alu        char(1)       not null,
    obs_quiz_alu       text          not null,
    fky_pregunta_quiz  int           not null,
    fky_inscripcion    int           not null,
    fky_alumno         varchar(15)   not null,
    est_qui_alu        char(1)       not null,

    primary key(cod_quiz_alu),

    foreign key(fky_pregunta_quiz) references pregunta_quiz(cod_pre_qui) on update CASCADE on delete RESTRICT,
    foreign key(fky_inscripcion) references inscripcion(cod_ins) on delete SET DEFAULT,
    foreign key(fky_alumno) references alumno(ide_alu) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE respuesta_evaluacion_curso
  (
    cod_eva_cur              int           not null auto_increment,
    fec_eva_cur              date          not null,
    fky_alumno               varchar(15)   not null,
    fky_tipo_curso           int           not null,
    fky_curso                int           not null,
    fky_pregunta_evaluacion  int           not null,
    res_eva_cur              char(1)       not null,
    obs_eva_cur              text          not null,
    est_eva_cur              char(1)       not null,

    primary key(cod_eva_cur),

    foreign key(fky_alumno) references alumno(ide_alu) on update CASCADE on delete RESTRICT,
    foreign key(fky_tipo_curso) references tipo_curso(cod_tip_cur) on update CASCADE on delete RESTRICT,
    foreign key(fky_curso) references curso(cod_cur) on update CASCADE on delete RESTRICT,
    foreign key(fky_pregunta_evaluacion) references pregunta_evaluacion_curso(cod_pre_eva) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

CREATE TABLE certificado
  (
    cod_cer          int           not null auto_increment,
    fky_inscripcion  int           not null,
    num_cer          int           not null,
    lib_cer          int           not null,
    fol_cer          int           not null,
    fec_cer          date          not null,
    md5_cer          varchar(32)   not null,
    est_cer          char(1)       not null,

    primary key(cod_cer),

    foreign key(fky_inscripcion) references inscripcion(cod_ins) on update CASCADE on delete RESTRICT
  )
 ENGINE = InnoDB;

-- ======================================================================

