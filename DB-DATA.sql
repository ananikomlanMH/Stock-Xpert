PGDMP                 	        {            stock_xpert    15.2    15.2 �    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    17031    stock_xpert    DATABASE     ~   CREATE DATABASE stock_xpert WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';
    DROP DATABASE stock_xpert;
                postgres    false            �            1259    17034    articles    TABLE     �   CREATE TABLE public.articles (
    id bigint NOT NULL,
    libelle character varying NOT NULL,
    categories_id bigint NOT NULL,
    pv integer
);
    DROP TABLE public.articles;
       public         heap    postgres    false            �            1259    17033    articles_categories_id_seq    SEQUENCE     �   CREATE SEQUENCE public.articles_categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.articles_categories_id_seq;
       public          postgres    false    216            �           0    0    articles_categories_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.articles_categories_id_seq OWNED BY public.articles.categories_id;
          public          postgres    false    215            �            1259    17032    articles_id_seq    SEQUENCE     x   CREATE SEQUENCE public.articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.articles_id_seq;
       public          postgres    false    216            �           0    0    articles_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.articles_id_seq OWNED BY public.articles.id;
          public          postgres    false    214            �            1259    17195    caisses    TABLE     �   CREATE TABLE public.caisses (
    id bigint NOT NULL,
    date date NOT NULL,
    montant integer,
    libelle character varying,
    utilisateurs_id bigint NOT NULL
);
    DROP TABLE public.caisses;
       public         heap    postgres    false            �            1259    17193    caisse_id_seq    SEQUENCE     v   CREATE SEQUENCE public.caisse_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.caisse_id_seq;
       public          postgres    false    249            �           0    0    caisse_id_seq    SEQUENCE OWNED BY     @   ALTER SEQUENCE public.caisse_id_seq OWNED BY public.caisses.id;
          public          postgres    false    247            �            1259    17194    caisse_utilisateurs_id_seq    SEQUENCE     �   CREATE SEQUENCE public.caisse_utilisateurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.caisse_utilisateurs_id_seq;
       public          postgres    false    249            �           0    0    caisse_utilisateurs_id_seq    SEQUENCE OWNED BY     Z   ALTER SEQUENCE public.caisse_utilisateurs_id_seq OWNED BY public.caisses.utilisateurs_id;
          public          postgres    false    248            �            1259    17044 
   categories    TABLE     c   CREATE TABLE public.categories (
    id bigint NOT NULL,
    libelle character varying NOT NULL
);
    DROP TABLE public.categories;
       public         heap    postgres    false            �            1259    17043    categories_id_seq    SEQUENCE     z   CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categories_id_seq;
       public          postgres    false    218            �           0    0    categories_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;
          public          postgres    false    217            �            1259    17139    configurations    TABLE     �   CREATE TABLE public.configurations (
    id bigint NOT NULL,
    margin_top integer,
    margin_bottom integer,
    header character varying,
    footer character varying
);
 "   DROP TABLE public.configurations;
       public         heap    postgres    false            �            1259    17138    configurations_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.configurations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.configurations_id_seq;
       public          postgres    false    246            �           0    0    configurations_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.configurations_id_seq OWNED BY public.configurations.id;
          public          postgres    false    245            �            1259    17103    depenses    TABLE     �   CREATE TABLE public.depenses (
    id bigint NOT NULL,
    motif character varying NOT NULL,
    date date NOT NULL,
    montant integer
);
    DROP TABLE public.depenses;
       public         heap    postgres    false            �            1259    17102    depenses_id_seq    SEQUENCE     x   CREATE SEQUENCE public.depenses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.depenses_id_seq;
       public          postgres    false    235            �           0    0    depenses_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.depenses_id_seq OWNED BY public.depenses.id;
          public          postgres    false    234            �            1259    17073    factures    TABLE     �   CREATE TABLE public.factures (
    id bigint NOT NULL,
    num character varying NOT NULL,
    date date NOT NULL,
    client character varying,
    utilisateurs_id bigint NOT NULL
);
    DROP TABLE public.factures;
       public         heap    postgres    false            �            1259    17094    factures_articles    TABLE     �   CREATE TABLE public.factures_articles (
    id bigint NOT NULL,
    factures_id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte integer NOT NULL,
    pv integer NOT NULL
);
 %   DROP TABLE public.factures_articles;
       public         heap    postgres    false            �            1259    17093 !   factures_articles_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.factures_articles_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.factures_articles_articles_id_seq;
       public          postgres    false    233            �           0    0 !   factures_articles_articles_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.factures_articles_articles_id_seq OWNED BY public.factures_articles.articles_id;
          public          postgres    false    232            �            1259    17092 !   factures_articles_factures_id_seq    SEQUENCE     �   CREATE SEQUENCE public.factures_articles_factures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.factures_articles_factures_id_seq;
       public          postgres    false    233            �           0    0 !   factures_articles_factures_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.factures_articles_factures_id_seq OWNED BY public.factures_articles.factures_id;
          public          postgres    false    231            �            1259    17091    factures_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.factures_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.factures_articles_id_seq;
       public          postgres    false    233            �           0    0    factures_articles_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.factures_articles_id_seq OWNED BY public.factures_articles.id;
          public          postgres    false    230            �            1259    17071    factures_id_seq    SEQUENCE     x   CREATE SEQUENCE public.factures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.factures_id_seq;
       public          postgres    false    227            �           0    0    factures_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.factures_id_seq OWNED BY public.factures.id;
          public          postgres    false    225            �            1259    17072    factures_utilisateurs_id_seq    SEQUENCE     �   CREATE SEQUENCE public.factures_utilisateurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.factures_utilisateurs_id_seq;
       public          postgres    false    227            �           0    0    factures_utilisateurs_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.factures_utilisateurs_id_seq OWNED BY public.factures.utilisateurs_id;
          public          postgres    false    226            �            1259    17112    inventaires    TABLE     T   CREATE TABLE public.inventaires (
    id bigint NOT NULL,
    date date NOT NULL
);
    DROP TABLE public.inventaires;
       public         heap    postgres    false            �            1259    17121    inventaires_articles    TABLE     �   CREATE TABLE public.inventaires_articles (
    id bigint NOT NULL,
    inventaires_id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte integer
);
 (   DROP TABLE public.inventaires_articles;
       public         heap    postgres    false            �            1259    17120 $   inventaires_articles_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.inventaires_articles_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ;   DROP SEQUENCE public.inventaires_articles_articles_id_seq;
       public          postgres    false    241            �           0    0 $   inventaires_articles_articles_id_seq    SEQUENCE OWNED BY     m   ALTER SEQUENCE public.inventaires_articles_articles_id_seq OWNED BY public.inventaires_articles.articles_id;
          public          postgres    false    240            �            1259    17118    inventaires_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.inventaires_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.inventaires_articles_id_seq;
       public          postgres    false    241            �           0    0    inventaires_articles_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.inventaires_articles_id_seq OWNED BY public.inventaires_articles.id;
          public          postgres    false    238            �            1259    17119 '   inventaires_articles_inventaires_id_seq    SEQUENCE     �   CREATE SEQUENCE public.inventaires_articles_inventaires_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 >   DROP SEQUENCE public.inventaires_articles_inventaires_id_seq;
       public          postgres    false    241            �           0    0 '   inventaires_articles_inventaires_id_seq    SEQUENCE OWNED BY     s   ALTER SEQUENCE public.inventaires_articles_inventaires_id_seq OWNED BY public.inventaires_articles.inventaires_id;
          public          postgres    false    239            �            1259    17111    inventaires_id_seq    SEQUENCE     {   CREATE SEQUENCE public.inventaires_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.inventaires_id_seq;
       public          postgres    false    237            �           0    0    inventaires_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.inventaires_id_seq OWNED BY public.inventaires.id;
          public          postgres    false    236            �            1259    17053    mouvements_stock    TABLE     y   CREATE TABLE public.mouvements_stock (
    id bigint NOT NULL,
    date date NOT NULL,
    type boolean DEFAULT false
);
 $   DROP TABLE public.mouvements_stock;
       public         heap    postgres    false            �            1259    17063    mouvements_stock_articles    TABLE     �   CREATE TABLE public.mouvements_stock_articles (
    id bigint NOT NULL,
    mouvements_stock_id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte integer,
    pa integer
);
 -   DROP TABLE public.mouvements_stock_articles;
       public         heap    postgres    false            �            1259    17062 )   mouvements_stock_articles_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mouvements_stock_articles_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 @   DROP SEQUENCE public.mouvements_stock_articles_articles_id_seq;
       public          postgres    false    224            �           0    0 )   mouvements_stock_articles_articles_id_seq    SEQUENCE OWNED BY     w   ALTER SEQUENCE public.mouvements_stock_articles_articles_id_seq OWNED BY public.mouvements_stock_articles.articles_id;
          public          postgres    false    223            �            1259    17060     mouvements_stock_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mouvements_stock_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.mouvements_stock_articles_id_seq;
       public          postgres    false    224            �           0    0     mouvements_stock_articles_id_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.mouvements_stock_articles_id_seq OWNED BY public.mouvements_stock_articles.id;
          public          postgres    false    221            �            1259    17061 1   mouvements_stock_articles_mouvements_stock_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mouvements_stock_articles_mouvements_stock_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 H   DROP SEQUENCE public.mouvements_stock_articles_mouvements_stock_id_seq;
       public          postgres    false    224            �           0    0 1   mouvements_stock_articles_mouvements_stock_id_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.mouvements_stock_articles_mouvements_stock_id_seq OWNED BY public.mouvements_stock_articles.mouvements_stock_id;
          public          postgres    false    222            �            1259    17052    mouvements_stock_id_seq    SEQUENCE     �   CREATE SEQUENCE public.mouvements_stock_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.mouvements_stock_id_seq;
       public          postgres    false    220            �           0    0    mouvements_stock_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.mouvements_stock_id_seq OWNED BY public.mouvements_stock.id;
          public          postgres    false    219            �            1259    17131    stocks    TABLE     �   CREATE TABLE public.stocks (
    id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte_stock bigint,
    qte_alerte bigint
);
    DROP TABLE public.stocks;
       public         heap    postgres    false            �            1259    17130    stocks_articles_id_seq    SEQUENCE        CREATE SEQUENCE public.stocks_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.stocks_articles_id_seq;
       public          postgres    false    244            �           0    0    stocks_articles_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.stocks_articles_id_seq OWNED BY public.stocks.articles_id;
          public          postgres    false    243            �            1259    17129    stocks_id_seq    SEQUENCE     v   CREATE SEQUENCE public.stocks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.stocks_id_seq;
       public          postgres    false    244            �           0    0    stocks_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.stocks_id_seq OWNED BY public.stocks.id;
          public          postgres    false    242            �            1259    17083    utilisateurs    TABLE     *  CREATE TABLE public.utilisateurs (
    id bigint NOT NULL,
    nom character varying NOT NULL,
    prenom character varying NOT NULL,
    telephone character varying,
    adresse character varying,
    login character varying,
    password character varying,
    type character varying NOT NULL
);
     DROP TABLE public.utilisateurs;
       public         heap    postgres    false            �            1259    17082    utilisateurs_id_seq    SEQUENCE     |   CREATE SEQUENCE public.utilisateurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.utilisateurs_id_seq;
       public          postgres    false    229            �           0    0    utilisateurs_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.utilisateurs_id_seq OWNED BY public.utilisateurs.id;
          public          postgres    false    228            �           2604    17037    articles id    DEFAULT     j   ALTER TABLE ONLY public.articles ALTER COLUMN id SET DEFAULT nextval('public.articles_id_seq'::regclass);
 :   ALTER TABLE public.articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    216    216            �           2604    17038    articles categories_id    DEFAULT     �   ALTER TABLE ONLY public.articles ALTER COLUMN categories_id SET DEFAULT nextval('public.articles_categories_id_seq'::regclass);
 E   ALTER TABLE public.articles ALTER COLUMN categories_id DROP DEFAULT;
       public          postgres    false    215    216    216            �           2604    17198 
   caisses id    DEFAULT     g   ALTER TABLE ONLY public.caisses ALTER COLUMN id SET DEFAULT nextval('public.caisse_id_seq'::regclass);
 9   ALTER TABLE public.caisses ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    247    249    249            �           2604    17199    caisses utilisateurs_id    DEFAULT     �   ALTER TABLE ONLY public.caisses ALTER COLUMN utilisateurs_id SET DEFAULT nextval('public.caisse_utilisateurs_id_seq'::regclass);
 F   ALTER TABLE public.caisses ALTER COLUMN utilisateurs_id DROP DEFAULT;
       public          postgres    false    249    248    249            �           2604    17047    categories id    DEFAULT     n   ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);
 <   ALTER TABLE public.categories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    218    218            �           2604    17142    configurations id    DEFAULT     v   ALTER TABLE ONLY public.configurations ALTER COLUMN id SET DEFAULT nextval('public.configurations_id_seq'::regclass);
 @   ALTER TABLE public.configurations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    245    246    246            �           2604    17106    depenses id    DEFAULT     j   ALTER TABLE ONLY public.depenses ALTER COLUMN id SET DEFAULT nextval('public.depenses_id_seq'::regclass);
 :   ALTER TABLE public.depenses ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    235    235            �           2604    17076    factures id    DEFAULT     j   ALTER TABLE ONLY public.factures ALTER COLUMN id SET DEFAULT nextval('public.factures_id_seq'::regclass);
 :   ALTER TABLE public.factures ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    225    227            �           2604    17077    factures utilisateurs_id    DEFAULT     �   ALTER TABLE ONLY public.factures ALTER COLUMN utilisateurs_id SET DEFAULT nextval('public.factures_utilisateurs_id_seq'::regclass);
 G   ALTER TABLE public.factures ALTER COLUMN utilisateurs_id DROP DEFAULT;
       public          postgres    false    227    226    227            �           2604    17097    factures_articles id    DEFAULT     |   ALTER TABLE ONLY public.factures_articles ALTER COLUMN id SET DEFAULT nextval('public.factures_articles_id_seq'::regclass);
 C   ALTER TABLE public.factures_articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    233    230    233            �           2604    17098    factures_articles factures_id    DEFAULT     �   ALTER TABLE ONLY public.factures_articles ALTER COLUMN factures_id SET DEFAULT nextval('public.factures_articles_factures_id_seq'::regclass);
 L   ALTER TABLE public.factures_articles ALTER COLUMN factures_id DROP DEFAULT;
       public          postgres    false    231    233    233            �           2604    17099    factures_articles articles_id    DEFAULT     �   ALTER TABLE ONLY public.factures_articles ALTER COLUMN articles_id SET DEFAULT nextval('public.factures_articles_articles_id_seq'::regclass);
 L   ALTER TABLE public.factures_articles ALTER COLUMN articles_id DROP DEFAULT;
       public          postgres    false    232    233    233            �           2604    17115    inventaires id    DEFAULT     p   ALTER TABLE ONLY public.inventaires ALTER COLUMN id SET DEFAULT nextval('public.inventaires_id_seq'::regclass);
 =   ALTER TABLE public.inventaires ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    236    237    237            �           2604    17124    inventaires_articles id    DEFAULT     �   ALTER TABLE ONLY public.inventaires_articles ALTER COLUMN id SET DEFAULT nextval('public.inventaires_articles_id_seq'::regclass);
 F   ALTER TABLE public.inventaires_articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    241    238    241            �           2604    17125 #   inventaires_articles inventaires_id    DEFAULT     �   ALTER TABLE ONLY public.inventaires_articles ALTER COLUMN inventaires_id SET DEFAULT nextval('public.inventaires_articles_inventaires_id_seq'::regclass);
 R   ALTER TABLE public.inventaires_articles ALTER COLUMN inventaires_id DROP DEFAULT;
       public          postgres    false    241    239    241            �           2604    17126     inventaires_articles articles_id    DEFAULT     �   ALTER TABLE ONLY public.inventaires_articles ALTER COLUMN articles_id SET DEFAULT nextval('public.inventaires_articles_articles_id_seq'::regclass);
 O   ALTER TABLE public.inventaires_articles ALTER COLUMN articles_id DROP DEFAULT;
       public          postgres    false    241    240    241            �           2604    17056    mouvements_stock id    DEFAULT     z   ALTER TABLE ONLY public.mouvements_stock ALTER COLUMN id SET DEFAULT nextval('public.mouvements_stock_id_seq'::regclass);
 B   ALTER TABLE public.mouvements_stock ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    219    220            �           2604    17066    mouvements_stock_articles id    DEFAULT     �   ALTER TABLE ONLY public.mouvements_stock_articles ALTER COLUMN id SET DEFAULT nextval('public.mouvements_stock_articles_id_seq'::regclass);
 K   ALTER TABLE public.mouvements_stock_articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    224    224            �           2604    17067 -   mouvements_stock_articles mouvements_stock_id    DEFAULT     �   ALTER TABLE ONLY public.mouvements_stock_articles ALTER COLUMN mouvements_stock_id SET DEFAULT nextval('public.mouvements_stock_articles_mouvements_stock_id_seq'::regclass);
 \   ALTER TABLE public.mouvements_stock_articles ALTER COLUMN mouvements_stock_id DROP DEFAULT;
       public          postgres    false    224    222    224            �           2604    17068 %   mouvements_stock_articles articles_id    DEFAULT     �   ALTER TABLE ONLY public.mouvements_stock_articles ALTER COLUMN articles_id SET DEFAULT nextval('public.mouvements_stock_articles_articles_id_seq'::regclass);
 T   ALTER TABLE public.mouvements_stock_articles ALTER COLUMN articles_id DROP DEFAULT;
       public          postgres    false    223    224    224            �           2604    17134 	   stocks id    DEFAULT     f   ALTER TABLE ONLY public.stocks ALTER COLUMN id SET DEFAULT nextval('public.stocks_id_seq'::regclass);
 8   ALTER TABLE public.stocks ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    242    244    244            �           2604    17135    stocks articles_id    DEFAULT     x   ALTER TABLE ONLY public.stocks ALTER COLUMN articles_id SET DEFAULT nextval('public.stocks_articles_id_seq'::regclass);
 A   ALTER TABLE public.stocks ALTER COLUMN articles_id DROP DEFAULT;
       public          postgres    false    243    244    244            �           2604    17086    utilisateurs id    DEFAULT     r   ALTER TABLE ONLY public.utilisateurs ALTER COLUMN id SET DEFAULT nextval('public.utilisateurs_id_seq'::regclass);
 >   ALTER TABLE public.utilisateurs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228    229            w          0    17034    articles 
   TABLE DATA           B   COPY public.articles (id, libelle, categories_id, pv) FROM stdin;
    public          postgres    false    216   ��       �          0    17195    caisses 
   TABLE DATA           N   COPY public.caisses (id, date, montant, libelle, utilisateurs_id) FROM stdin;
    public          postgres    false    249   �       y          0    17044 
   categories 
   TABLE DATA           1   COPY public.categories (id, libelle) FROM stdin;
    public          postgres    false    218   f�       �          0    17139    configurations 
   TABLE DATA           W   COPY public.configurations (id, margin_top, margin_bottom, header, footer) FROM stdin;
    public          postgres    false    246   }�       �          0    17103    depenses 
   TABLE DATA           <   COPY public.depenses (id, motif, date, montant) FROM stdin;
    public          postgres    false    235   ��       �          0    17073    factures 
   TABLE DATA           J   COPY public.factures (id, num, date, client, utilisateurs_id) FROM stdin;
    public          postgres    false    227   ó       �          0    17094    factures_articles 
   TABLE DATA           R   COPY public.factures_articles (id, factures_id, articles_id, qte, pv) FROM stdin;
    public          postgres    false    233   "�       �          0    17112    inventaires 
   TABLE DATA           /   COPY public.inventaires (id, date) FROM stdin;
    public          postgres    false    237   ��       �          0    17121    inventaires_articles 
   TABLE DATA           T   COPY public.inventaires_articles (id, inventaires_id, articles_id, qte) FROM stdin;
    public          postgres    false    241   ��       {          0    17053    mouvements_stock 
   TABLE DATA           :   COPY public.mouvements_stock (id, date, type) FROM stdin;
    public          postgres    false    220   ��                 0    17063    mouvements_stock_articles 
   TABLE DATA           b   COPY public.mouvements_stock_articles (id, mouvements_stock_id, articles_id, qte, pa) FROM stdin;
    public          postgres    false    224   ۴       �          0    17131    stocks 
   TABLE DATA           H   COPY public.stocks (id, articles_id, qte_stock, qte_alerte) FROM stdin;
    public          postgres    false    244   ��       �          0    17083    utilisateurs 
   TABLE DATA           b   COPY public.utilisateurs (id, nom, prenom, telephone, adresse, login, password, type) FROM stdin;
    public          postgres    false    229   g�       �           0    0    articles_categories_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.articles_categories_id_seq', 1, false);
          public          postgres    false    215            �           0    0    articles_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.articles_id_seq', 1, false);
          public          postgres    false    214            �           0    0    caisse_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.caisse_id_seq', 2, true);
          public          postgres    false    247            �           0    0    caisse_utilisateurs_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.caisse_utilisateurs_id_seq', 1, false);
          public          postgres    false    248            �           0    0    categories_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.categories_id_seq', 1, false);
          public          postgres    false    217            �           0    0    configurations_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.configurations_id_seq', 1, true);
          public          postgres    false    245            �           0    0    depenses_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.depenses_id_seq', 1, false);
          public          postgres    false    234            �           0    0 !   factures_articles_articles_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.factures_articles_articles_id_seq', 1, false);
          public          postgres    false    232            �           0    0 !   factures_articles_factures_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.factures_articles_factures_id_seq', 1, false);
          public          postgres    false    231            �           0    0    factures_articles_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.factures_articles_id_seq', 20, true);
          public          postgres    false    230            �           0    0    factures_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.factures_id_seq', 4, true);
          public          postgres    false    225            �           0    0    factures_utilisateurs_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.factures_utilisateurs_id_seq', 1, false);
          public          postgres    false    226            �           0    0 $   inventaires_articles_articles_id_seq    SEQUENCE SET     S   SELECT pg_catalog.setval('public.inventaires_articles_articles_id_seq', 1, false);
          public          postgres    false    240            �           0    0    inventaires_articles_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.inventaires_articles_id_seq', 1, false);
          public          postgres    false    238            �           0    0 '   inventaires_articles_inventaires_id_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.inventaires_articles_inventaires_id_seq', 1, false);
          public          postgres    false    239            �           0    0    inventaires_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.inventaires_id_seq', 1, false);
          public          postgres    false    236            �           0    0 )   mouvements_stock_articles_articles_id_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public.mouvements_stock_articles_articles_id_seq', 1, false);
          public          postgres    false    223            �           0    0     mouvements_stock_articles_id_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.mouvements_stock_articles_id_seq', 1, false);
          public          postgres    false    221            �           0    0 1   mouvements_stock_articles_mouvements_stock_id_seq    SEQUENCE SET     `   SELECT pg_catalog.setval('public.mouvements_stock_articles_mouvements_stock_id_seq', 1, false);
          public          postgres    false    222            �           0    0    mouvements_stock_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.mouvements_stock_id_seq', 1, false);
          public          postgres    false    219            �           0    0    stocks_articles_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.stocks_articles_id_seq', 1, false);
          public          postgres    false    243            �           0    0    stocks_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.stocks_id_seq', 1, false);
          public          postgres    false    242            �           0    0    utilisateurs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.utilisateurs_id_seq', 1, true);
          public          postgres    false    228            �           2606    17042    articles articles_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.articles DROP CONSTRAINT articles_pkey;
       public            postgres    false    216            �           2606    17203    caisses caisse_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.caisses
    ADD CONSTRAINT caisse_pkey PRIMARY KEY (id);
 =   ALTER TABLE ONLY public.caisses DROP CONSTRAINT caisse_pkey;
       public            postgres    false    249            �           2606    17051    categories categories_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_pkey;
       public            postgres    false    218            �           2606    17146 "   configurations configurations_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.configurations
    ADD CONSTRAINT configurations_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.configurations DROP CONSTRAINT configurations_pkey;
       public            postgres    false    246            �           2606    17110    depenses depenses_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.depenses
    ADD CONSTRAINT depenses_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.depenses DROP CONSTRAINT depenses_pkey;
       public            postgres    false    235            �           2606    17101 (   factures_articles factures_articles_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.factures_articles
    ADD CONSTRAINT factures_articles_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.factures_articles DROP CONSTRAINT factures_articles_pkey;
       public            postgres    false    233            �           2606    17081    factures factures_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.factures
    ADD CONSTRAINT factures_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.factures DROP CONSTRAINT factures_pkey;
       public            postgres    false    227            �           2606    17128 .   inventaires_articles inventaires_articles_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.inventaires_articles
    ADD CONSTRAINT inventaires_articles_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.inventaires_articles DROP CONSTRAINT inventaires_articles_pkey;
       public            postgres    false    241            �           2606    17117    inventaires inventaires_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.inventaires
    ADD CONSTRAINT inventaires_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.inventaires DROP CONSTRAINT inventaires_pkey;
       public            postgres    false    237            �           2606    17070 8   mouvements_stock_articles mouvements_stock_articles_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.mouvements_stock_articles
    ADD CONSTRAINT mouvements_stock_articles_pkey PRIMARY KEY (id);
 b   ALTER TABLE ONLY public.mouvements_stock_articles DROP CONSTRAINT mouvements_stock_articles_pkey;
       public            postgres    false    224            �           2606    17059 &   mouvements_stock mouvements_stock_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.mouvements_stock
    ADD CONSTRAINT mouvements_stock_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.mouvements_stock DROP CONSTRAINT mouvements_stock_pkey;
       public            postgres    false    220            �           2606    17137    stocks stocks_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.stocks
    ADD CONSTRAINT stocks_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.stocks DROP CONSTRAINT stocks_pkey;
       public            postgres    false    244            �           2606    17090    utilisateurs utilisateurs_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.utilisateurs
    ADD CONSTRAINT utilisateurs_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.utilisateurs DROP CONSTRAINT utilisateurs_pkey;
       public            postgres    false    229            �           2606    17147 $   articles articles_categories_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_categories_id_fkey FOREIGN KEY (categories_id) REFERENCES public.categories(id) NOT VALID;
 N   ALTER TABLE ONLY public.articles DROP CONSTRAINT articles_categories_id_fkey;
       public          postgres    false    216    3270    218            �           2606    17204 #   caisses caisse_utilisateurs_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.caisses
    ADD CONSTRAINT caisse_utilisateurs_id_fkey FOREIGN KEY (utilisateurs_id) REFERENCES public.utilisateurs(id) NOT VALID;
 M   ALTER TABLE ONLY public.caisses DROP CONSTRAINT caisse_utilisateurs_id_fkey;
       public          postgres    false    249    3278    229            �           2606    17172 4   factures_articles factures_articles_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.factures_articles
    ADD CONSTRAINT factures_articles_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 ^   ALTER TABLE ONLY public.factures_articles DROP CONSTRAINT factures_articles_articles_id_fkey;
       public          postgres    false    3268    216    233            �           2606    17167 4   factures_articles factures_articles_factures_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.factures_articles
    ADD CONSTRAINT factures_articles_factures_id_fkey FOREIGN KEY (factures_id) REFERENCES public.factures(id) NOT VALID;
 ^   ALTER TABLE ONLY public.factures_articles DROP CONSTRAINT factures_articles_factures_id_fkey;
       public          postgres    false    233    227    3276            �           2606    17162 &   factures factures_utilisateurs_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.factures
    ADD CONSTRAINT factures_utilisateurs_id_fkey FOREIGN KEY (utilisateurs_id) REFERENCES public.utilisateurs(id) NOT VALID;
 P   ALTER TABLE ONLY public.factures DROP CONSTRAINT factures_utilisateurs_id_fkey;
       public          postgres    false    227    3278    229            �           2606    17182 :   inventaires_articles inventaires_articles_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.inventaires_articles
    ADD CONSTRAINT inventaires_articles_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 d   ALTER TABLE ONLY public.inventaires_articles DROP CONSTRAINT inventaires_articles_articles_id_fkey;
       public          postgres    false    241    216    3268            �           2606    17177 =   inventaires_articles inventaires_articles_inventaires_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.inventaires_articles
    ADD CONSTRAINT inventaires_articles_inventaires_id_fkey FOREIGN KEY (inventaires_id) REFERENCES public.inventaires(id) NOT VALID;
 g   ALTER TABLE ONLY public.inventaires_articles DROP CONSTRAINT inventaires_articles_inventaires_id_fkey;
       public          postgres    false    237    3284    241            �           2606    17157 D   mouvements_stock_articles mouvements_stock_articles_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.mouvements_stock_articles
    ADD CONSTRAINT mouvements_stock_articles_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 n   ALTER TABLE ONLY public.mouvements_stock_articles DROP CONSTRAINT mouvements_stock_articles_articles_id_fkey;
       public          postgres    false    216    3268    224            �           2606    17152 L   mouvements_stock_articles mouvements_stock_articles_mouvements_stock_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.mouvements_stock_articles
    ADD CONSTRAINT mouvements_stock_articles_mouvements_stock_id_fkey FOREIGN KEY (mouvements_stock_id) REFERENCES public.mouvements_stock(id) NOT VALID;
 v   ALTER TABLE ONLY public.mouvements_stock_articles DROP CONSTRAINT mouvements_stock_articles_mouvements_stock_id_fkey;
       public          postgres    false    220    3272    224            �           2606    17187    stocks stocks_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.stocks
    ADD CONSTRAINT stocks_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 H   ALTER TABLE ONLY public.stocks DROP CONSTRAINT stocks_articles_id_fkey;
       public          postgres    false    216    3268    244            w     x�mU�n�F]��
��J�y�����ƈ���Ici�ÒC���/����?�3��Fh -$���8�+N_�&�v��c���>M��!�m�J�N
����c8�i	˚d��`�>vch7� ��ѷ�����%��J[���w;߄�$*����q�d��ا!_t5�TmM�]��[��e+�H8+��NM�p�I�����M��p��2�d]sV��ԅ��S�&����8����(�x������U�cw�K��Q8�٥�;o�z_}������qI�a~i���|�z�i�S�>�4T��1��w������I�L��S�ve�b�I�R�D0�C���_��2|��N0n����>���O�Hɸ�FO�{�MC�l,�ӌ�t359>������i����ǽ/���k��k�*.�&���U�0�5"���	M�2F0!�6A&�!2�)��V�_�aYE\I�^��DJ.�q&�N߿��瑊R��q��1L��|LhF�����>����"�!{ȝ4����L@�$�'Җ�֜K&+�//��Q�K��b���|l�cH]��2�Wڑ���OH��Z��2�����h��rZu���j��XT��x<nS�]��(������.&r�SkǠ��ݶ(&���)�򁴀���~k�!�E�$}�&8Tr���r\B�B���=X����TK�j��LU��O�/6d@_���'�N��a�߂�0�b��xV1�|uF5x%�cJч�M�^W�Sd�p~�����T%�m��90Nc�Pţ��`��i�=���Z�%����&��1���u�m�q�f�ӗ�+��1�M0.A�� �.�\����r�
�@���Y�@3[Y<1t��q~�E��q�xɷ�e��q��\�4�>����R	��*���
�"�ja-3��r���,0[�@����Ol���Z�tA���C�m=��܋�|����m�_�2��0��Z��i�	�
�����o��2��&N�_c����E      �   E   x�3�4202�50�5��4�0466�K�+IU�;����9��P���$�e�������M���=... iV      y     x�eTKn�0]O�]V-��>�$E�14AV��ӕH�"��E��5t�)[�-�k��p�GF�:�3����A��6�myO��UH ��$��-�}o5?�E��W� ��r��*��J\6+�ȡ[	7b��D!��4��(�+�1�[�W�bxfU���	I�d�����ѻz
OZ�V_��̚q Q�JHkX�a�D9�ػM��8�
xbzc[�Q~��X���$�z��8��#x��B����j�f<�$�?J���q�	<,�)<)�ׯOb�PnN��^Y��p���M��0��)⩬�8���c�8ԶbFl�&��K��H����d�[�(a��9*���O���2�p�U�<��3�1�WF+)ޭC3��:�Q^,�*�g�p��qЬ��@��Z(��W��N������y^���F�3�ɐ�xw� |k;-Z�Nc<Ee��K��Ҝ�	���s�x/�d�c4�p����Ȧ��_�.�7\Z��?gO��u�%4D�'&�Pt5k�i,O��ImNhr��︬K4�m+�?�����Q�&�q��F���5�3���n�N`5�����'����s�VB�x�Cx\��+$�d�^���%�P�f�-K��9Kx��Q&G@��sd��)2
7L�y���2x��I�;�|w��TL�ܹǹ1+��C�w;+�E+c��(�<���ʵ�.��^G�kA���{���=aж�(�D*TC�7���q!�7x�sOK�_�4���߾����"�{�":}�N��J��gB��'      �      x�3�46�43���"�=...  �*      �      x������ � �      �   O   x�3�tst10�5202605��1tLu�L�����D��ܤD��ļLNC.�#�<���R��KsR+��c���� �	�      �   R   x�E���@��]Ld|�����9���@H�+<I�㊒�GY�������v�"sOo�"�n�D+�3��ٍ�>U� x�*      �      x������ � �      �      x������ � �      {      x������ � �            x������ � �      �   _  x�-�Q�0����L%@��e�?�>�Or������B��̣x��S��*�J�*�j�������>:ʣ�~��x����gX@5�^%e��
�#L��wi��7�ӳ[�9����^I8>
(Pn�G�FB����������0�A��h����kk����1����#k6}Fs⺡'B���s"e��0�E{����� ���`�d:o�1q&�]�hL~N����xX���׍�'hl���c�;��C����L�Pw�Lvu�rLQ&����~Hd��u� �W�ٸFCpGR`]�.�M���;}�C��r_����SL~�	b��#@�wh_�T������.�_�����c�%j      �   s   x�3��L*����MT��/-.N�T���LL����T1�T14PI*t
7�,q*1���H�++2�*ͲLq�*ΰ�(rvw�))74��Lʉ�*2K3��t�Y\R�X�ZZ����� 7O!�     