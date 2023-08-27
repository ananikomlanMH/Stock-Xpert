PGDMP                          {            sx    15.2    15.2 k    ~           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    25442    sx    DATABASE     u   CREATE DATABASE sx WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';
    DROP DATABASE sx;
                postgres    false            �            1259    25694    approvisionnements    TABLE     �   CREATE TABLE public.approvisionnements (
    id bigint NOT NULL,
    num character varying NOT NULL,
    date date NOT NULL,
    fournisseur character varying,
    utilisateurs_id bigint NOT NULL
);
 &   DROP TABLE public.approvisionnements;
       public         heap    postgres    false            �            1259    25693    approvisionnement_id_seq    SEQUENCE     �   CREATE SEQUENCE public.approvisionnement_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.approvisionnement_id_seq;
       public          postgres    false    237            �           0    0    approvisionnement_id_seq    SEQUENCE OWNED BY     V   ALTER SEQUENCE public.approvisionnement_id_seq OWNED BY public.approvisionnements.id;
          public          postgres    false    236            �            1259    25703    approvisionnments_articles    TABLE     �   CREATE TABLE public.approvisionnments_articles (
    id bigint NOT NULL,
    approvisionnements_id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte integer NOT NULL,
    pa integer NOT NULL
);
 .   DROP TABLE public.approvisionnments_articles;
       public         heap    postgres    false            �            1259    25702 "   approvisionnements_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.approvisionnements_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.approvisionnements_articles_id_seq;
       public          postgres    false    239            �           0    0 "   approvisionnements_articles_id_seq    SEQUENCE OWNED BY     h   ALTER SEQUENCE public.approvisionnements_articles_id_seq OWNED BY public.approvisionnments_articles.id;
          public          postgres    false    238            �            1259    25601    articles    TABLE     �   CREATE TABLE public.articles (
    id bigint NOT NULL,
    libelle character varying NOT NULL,
    categories_id bigint NOT NULL,
    pv integer
);
    DROP TABLE public.articles;
       public         heap    postgres    false            �            1259    25600    articles_id_seq    SEQUENCE     x   CREATE SEQUENCE public.articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.articles_id_seq;
       public          postgres    false    215            �           0    0    articles_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.articles_id_seq OWNED BY public.articles.id;
          public          postgres    false    214            �            1259    25610    caisses    TABLE     �   CREATE TABLE public.caisses (
    id bigint NOT NULL,
    date date NOT NULL,
    montant integer,
    libelle character varying,
    utilisateurs_id bigint NOT NULL
);
    DROP TABLE public.caisses;
       public         heap    postgres    false            �            1259    25609    caisses_id_seq    SEQUENCE     w   CREATE SEQUENCE public.caisses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.caisses_id_seq;
       public          postgres    false    217            �           0    0    caisses_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.caisses_id_seq OWNED BY public.caisses.id;
          public          postgres    false    216            �            1259    25619 
   categories    TABLE     c   CREATE TABLE public.categories (
    id bigint NOT NULL,
    libelle character varying NOT NULL
);
    DROP TABLE public.categories;
       public         heap    postgres    false            �            1259    25618    categories_id_seq    SEQUENCE     z   CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categories_id_seq;
       public          postgres    false    219            �           0    0    categories_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;
          public          postgres    false    218            �            1259    25628    configurations    TABLE     �   CREATE TABLE public.configurations (
    id bigint NOT NULL,
    margin_top integer,
    margin_bottom integer,
    header character varying,
    footer character varying
);
 "   DROP TABLE public.configurations;
       public         heap    postgres    false            �            1259    25627    configurations_id_seq    SEQUENCE     ~   CREATE SEQUENCE public.configurations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.configurations_id_seq;
       public          postgres    false    221            �           0    0    configurations_id_seq    SEQUENCE OWNED BY     O   ALTER SEQUENCE public.configurations_id_seq OWNED BY public.configurations.id;
          public          postgres    false    220            �            1259    25637    depenses    TABLE     �   CREATE TABLE public.depenses (
    id bigint NOT NULL,
    motif character varying NOT NULL,
    date date NOT NULL,
    montant integer
);
    DROP TABLE public.depenses;
       public         heap    postgres    false            �            1259    25636    depenses_id_seq    SEQUENCE     x   CREATE SEQUENCE public.depenses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.depenses_id_seq;
       public          postgres    false    223            �           0    0    depenses_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.depenses_id_seq OWNED BY public.depenses.id;
          public          postgres    false    222            �            1259    25646    factures    TABLE     �   CREATE TABLE public.factures (
    id bigint NOT NULL,
    num character varying NOT NULL,
    date date NOT NULL,
    client character varying,
    utilisateurs_id bigint NOT NULL
);
    DROP TABLE public.factures;
       public         heap    postgres    false            �            1259    25655    factures_articles    TABLE     �   CREATE TABLE public.factures_articles (
    id bigint NOT NULL,
    factures_id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte integer NOT NULL,
    pv integer NOT NULL
);
 %   DROP TABLE public.factures_articles;
       public         heap    postgres    false            �            1259    25654    factures_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.factures_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.factures_articles_id_seq;
       public          postgres    false    227            �           0    0    factures_articles_id_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.factures_articles_id_seq OWNED BY public.factures_articles.id;
          public          postgres    false    226            �            1259    25645    factures_id_seq    SEQUENCE     x   CREATE SEQUENCE public.factures_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.factures_id_seq;
       public          postgres    false    225            �           0    0    factures_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.factures_id_seq OWNED BY public.factures.id;
          public          postgres    false    224            �            1259    25662    inventaires    TABLE     �   CREATE TABLE public.inventaires (
    id bigint NOT NULL,
    num character varying,
    date date NOT NULL,
    utilisateurs_id bigint NOT NULL
);
    DROP TABLE public.inventaires;
       public         heap    postgres    false            �            1259    25671    inventaires_articles    TABLE     �   CREATE TABLE public.inventaires_articles (
    id bigint NOT NULL,
    inventaires_id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte integer,
    qte_virtuel integer
);
 (   DROP TABLE public.inventaires_articles;
       public         heap    postgres    false            �            1259    25670    inventaires_articles_id_seq    SEQUENCE     �   CREATE SEQUENCE public.inventaires_articles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.inventaires_articles_id_seq;
       public          postgres    false    231            �           0    0    inventaires_articles_id_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.inventaires_articles_id_seq OWNED BY public.inventaires_articles.id;
          public          postgres    false    230            �            1259    25661    inventaires_id_seq    SEQUENCE     {   CREATE SEQUENCE public.inventaires_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.inventaires_id_seq;
       public          postgres    false    229            �           0    0    inventaires_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.inventaires_id_seq OWNED BY public.inventaires.id;
          public          postgres    false    228            �            1259    25678    stocks    TABLE     �   CREATE TABLE public.stocks (
    id bigint NOT NULL,
    articles_id bigint NOT NULL,
    qte_stock bigint,
    qte_alerte bigint
);
    DROP TABLE public.stocks;
       public         heap    postgres    false            �            1259    25677    stocks_id_seq    SEQUENCE     v   CREATE SEQUENCE public.stocks_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.stocks_id_seq;
       public          postgres    false    233            �           0    0    stocks_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.stocks_id_seq OWNED BY public.stocks.id;
          public          postgres    false    232            �            1259    25685    utilisateurs    TABLE     *  CREATE TABLE public.utilisateurs (
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
       public         heap    postgres    false            �            1259    25684    utilisateurs_id_seq    SEQUENCE     |   CREATE SEQUENCE public.utilisateurs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.utilisateurs_id_seq;
       public          postgres    false    235            �           0    0    utilisateurs_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.utilisateurs_id_seq OWNED BY public.utilisateurs.id;
          public          postgres    false    234            �           2604    25697    approvisionnements id    DEFAULT     }   ALTER TABLE ONLY public.approvisionnements ALTER COLUMN id SET DEFAULT nextval('public.approvisionnement_id_seq'::regclass);
 D   ALTER TABLE public.approvisionnements ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    237    236    237            �           2604    25706    approvisionnments_articles id    DEFAULT     �   ALTER TABLE ONLY public.approvisionnments_articles ALTER COLUMN id SET DEFAULT nextval('public.approvisionnements_articles_id_seq'::regclass);
 L   ALTER TABLE public.approvisionnments_articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    239    238    239            �           2604    25604    articles id    DEFAULT     j   ALTER TABLE ONLY public.articles ALTER COLUMN id SET DEFAULT nextval('public.articles_id_seq'::regclass);
 :   ALTER TABLE public.articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    214    215    215            �           2604    25613 
   caisses id    DEFAULT     h   ALTER TABLE ONLY public.caisses ALTER COLUMN id SET DEFAULT nextval('public.caisses_id_seq'::regclass);
 9   ALTER TABLE public.caisses ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    217    216    217            �           2604    25622    categories id    DEFAULT     n   ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);
 <   ALTER TABLE public.categories ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    219    219            �           2604    25631    configurations id    DEFAULT     v   ALTER TABLE ONLY public.configurations ALTER COLUMN id SET DEFAULT nextval('public.configurations_id_seq'::regclass);
 @   ALTER TABLE public.configurations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            �           2604    25640    depenses id    DEFAULT     j   ALTER TABLE ONLY public.depenses ALTER COLUMN id SET DEFAULT nextval('public.depenses_id_seq'::regclass);
 :   ALTER TABLE public.depenses ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223            �           2604    25649    factures id    DEFAULT     j   ALTER TABLE ONLY public.factures ALTER COLUMN id SET DEFAULT nextval('public.factures_id_seq'::regclass);
 :   ALTER TABLE public.factures ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    225    224    225            �           2604    25658    factures_articles id    DEFAULT     |   ALTER TABLE ONLY public.factures_articles ALTER COLUMN id SET DEFAULT nextval('public.factures_articles_id_seq'::regclass);
 C   ALTER TABLE public.factures_articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    227    227            �           2604    25665    inventaires id    DEFAULT     p   ALTER TABLE ONLY public.inventaires ALTER COLUMN id SET DEFAULT nextval('public.inventaires_id_seq'::regclass);
 =   ALTER TABLE public.inventaires ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228    229            �           2604    25674    inventaires_articles id    DEFAULT     �   ALTER TABLE ONLY public.inventaires_articles ALTER COLUMN id SET DEFAULT nextval('public.inventaires_articles_id_seq'::regclass);
 F   ALTER TABLE public.inventaires_articles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    231    230    231            �           2604    25681 	   stocks id    DEFAULT     f   ALTER TABLE ONLY public.stocks ALTER COLUMN id SET DEFAULT nextval('public.stocks_id_seq'::regclass);
 8   ALTER TABLE public.stocks ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    232    233    233            �           2604    25688    utilisateurs id    DEFAULT     r   ALTER TABLE ONLY public.utilisateurs ALTER COLUMN id SET DEFAULT nextval('public.utilisateurs_id_seq'::regclass);
 >   ALTER TABLE public.utilisateurs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    235    234    235            y          0    25694    approvisionnements 
   TABLE DATA           Y   COPY public.approvisionnements (id, num, date, fournisseur, utilisateurs_id) FROM stdin;
    public          postgres    false    237   �~       {          0    25703    approvisionnments_articles 
   TABLE DATA           e   COPY public.approvisionnments_articles (id, approvisionnements_id, articles_id, qte, pa) FROM stdin;
    public          postgres    false    239          c          0    25601    articles 
   TABLE DATA           B   COPY public.articles (id, libelle, categories_id, pv) FROM stdin;
    public          postgres    false    215   B       e          0    25610    caisses 
   TABLE DATA           N   COPY public.caisses (id, date, montant, libelle, utilisateurs_id) FROM stdin;
    public          postgres    false    217   W�       g          0    25619 
   categories 
   TABLE DATA           1   COPY public.categories (id, libelle) FROM stdin;
    public          postgres    false    219   ��       i          0    25628    configurations 
   TABLE DATA           W   COPY public.configurations (id, margin_top, margin_bottom, header, footer) FROM stdin;
    public          postgres    false    221   Ȇ       k          0    25637    depenses 
   TABLE DATA           <   COPY public.depenses (id, motif, date, montant) FROM stdin;
    public          postgres    false    223   �       m          0    25646    factures 
   TABLE DATA           J   COPY public.factures (id, num, date, client, utilisateurs_id) FROM stdin;
    public          postgres    false    225   ;�       o          0    25655    factures_articles 
   TABLE DATA           R   COPY public.factures_articles (id, factures_id, articles_id, qte, pv) FROM stdin;
    public          postgres    false    227   ��       q          0    25662    inventaires 
   TABLE DATA           E   COPY public.inventaires (id, num, date, utilisateurs_id) FROM stdin;
    public          postgres    false    229   ��       s          0    25671    inventaires_articles 
   TABLE DATA           a   COPY public.inventaires_articles (id, inventaires_id, articles_id, qte, qte_virtuel) FROM stdin;
    public          postgres    false    231   �       u          0    25678    stocks 
   TABLE DATA           H   COPY public.stocks (id, articles_id, qte_stock, qte_alerte) FROM stdin;
    public          postgres    false    233   O�       w          0    25685    utilisateurs 
   TABLE DATA           b   COPY public.utilisateurs (id, nom, prenom, telephone, adresse, login, password, type) FROM stdin;
    public          postgres    false    235   ��       �           0    0    approvisionnement_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.approvisionnement_id_seq', 3, true);
          public          postgres    false    236            �           0    0 "   approvisionnements_articles_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.approvisionnements_articles_id_seq', 1, true);
          public          postgres    false    238            �           0    0    articles_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.articles_id_seq', 1, false);
          public          postgres    false    214            �           0    0    caisses_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.caisses_id_seq', 1, true);
          public          postgres    false    216            �           0    0    categories_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.categories_id_seq', 1, false);
          public          postgres    false    218            �           0    0    configurations_id_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.configurations_id_seq', 1, true);
          public          postgres    false    220            �           0    0    depenses_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.depenses_id_seq', 2, true);
          public          postgres    false    222            �           0    0    factures_articles_id_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.factures_articles_id_seq', 22, true);
          public          postgres    false    226            �           0    0    factures_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.factures_id_seq', 6, true);
          public          postgres    false    224            �           0    0    inventaires_articles_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.inventaires_articles_id_seq', 65, true);
          public          postgres    false    230            �           0    0    inventaires_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.inventaires_id_seq', 1, true);
          public          postgres    false    228            �           0    0    stocks_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.stocks_id_seq', 1, false);
          public          postgres    false    232            �           0    0    utilisateurs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.utilisateurs_id_seq', 2, true);
          public          postgres    false    234            �           2606    25708 .   approvisionnments_articles appro_articles_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.approvisionnments_articles
    ADD CONSTRAINT appro_articles_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.approvisionnments_articles DROP CONSTRAINT appro_articles_pkey;
       public            postgres    false    239            �           2606    25701    approvisionnements appro_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.approvisionnements
    ADD CONSTRAINT appro_pkey PRIMARY KEY (id);
 G   ALTER TABLE ONLY public.approvisionnements DROP CONSTRAINT appro_pkey;
       public            postgres    false    237            �           2606    25608    articles articles_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.articles DROP CONSTRAINT articles_pkey;
       public            postgres    false    215            �           2606    25617    caisses caisse_pkey 
   CONSTRAINT     Q   ALTER TABLE ONLY public.caisses
    ADD CONSTRAINT caisse_pkey PRIMARY KEY (id);
 =   ALTER TABLE ONLY public.caisses DROP CONSTRAINT caisse_pkey;
       public            postgres    false    217            �           2606    25626    categories categories_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categories DROP CONSTRAINT categories_pkey;
       public            postgres    false    219            �           2606    25635 "   configurations configurations_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.configurations
    ADD CONSTRAINT configurations_pkey PRIMARY KEY (id);
 L   ALTER TABLE ONLY public.configurations DROP CONSTRAINT configurations_pkey;
       public            postgres    false    221            �           2606    25644    depenses depenses_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.depenses
    ADD CONSTRAINT depenses_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.depenses DROP CONSTRAINT depenses_pkey;
       public            postgres    false    223            �           2606    25660 (   factures_articles factures_articles_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.factures_articles
    ADD CONSTRAINT factures_articles_pkey PRIMARY KEY (id);
 R   ALTER TABLE ONLY public.factures_articles DROP CONSTRAINT factures_articles_pkey;
       public            postgres    false    227            �           2606    25653    factures factures_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.factures
    ADD CONSTRAINT factures_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.factures DROP CONSTRAINT factures_pkey;
       public            postgres    false    225            �           2606    25676 .   inventaires_articles inventaires_articles_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public.inventaires_articles
    ADD CONSTRAINT inventaires_articles_pkey PRIMARY KEY (id);
 X   ALTER TABLE ONLY public.inventaires_articles DROP CONSTRAINT inventaires_articles_pkey;
       public            postgres    false    231            �           2606    25669    inventaires inventaires_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.inventaires
    ADD CONSTRAINT inventaires_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.inventaires DROP CONSTRAINT inventaires_pkey;
       public            postgres    false    229            �           2606    25683    stocks stocks_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.stocks
    ADD CONSTRAINT stocks_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.stocks DROP CONSTRAINT stocks_pkey;
       public            postgres    false    233            �           2606    25692    utilisateurs utilisateurs_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.utilisateurs
    ADD CONSTRAINT utilisateurs_pkey PRIMARY KEY (id);
 H   ALTER TABLE ONLY public.utilisateurs DROP CONSTRAINT utilisateurs_pkey;
       public            postgres    false    235            �           2606    25754 9   approvisionnements approvisionnement_utilisateurs_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.approvisionnements
    ADD CONSTRAINT approvisionnement_utilisateurs_id_fkey FOREIGN KEY (utilisateurs_id) REFERENCES public.utilisateurs(id) NOT VALID;
 c   ALTER TABLE ONLY public.approvisionnements DROP CONSTRAINT approvisionnement_utilisateurs_id_fkey;
       public          postgres    false    235    3267    237            �           2606    25759 P   approvisionnments_articles approvisionnements_articles_approvisionnement_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.approvisionnments_articles
    ADD CONSTRAINT approvisionnements_articles_approvisionnement_id_fkey FOREIGN KEY (approvisionnements_id) REFERENCES public.approvisionnements(id) NOT VALID;
 z   ALTER TABLE ONLY public.approvisionnments_articles DROP CONSTRAINT approvisionnements_articles_approvisionnement_id_fkey;
       public          postgres    false    239    3269    237            �           2606    25764 G   approvisionnments_articles approvisionnements_articles_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.approvisionnments_articles
    ADD CONSTRAINT approvisionnements_articles_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 q   ALTER TABLE ONLY public.approvisionnments_articles DROP CONSTRAINT approvisionnements_articles_articles_id_fkey;
       public          postgres    false    3247    239    215            �           2606    25709 $   articles articles_categories_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_categories_id_fkey FOREIGN KEY (categories_id) REFERENCES public.categories(id) NOT VALID;
 N   ALTER TABLE ONLY public.articles DROP CONSTRAINT articles_categories_id_fkey;
       public          postgres    false    3251    219    215            �           2606    25714 #   caisses caisse_utilisateurs_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.caisses
    ADD CONSTRAINT caisse_utilisateurs_id_fkey FOREIGN KEY (utilisateurs_id) REFERENCES public.utilisateurs(id) NOT VALID;
 M   ALTER TABLE ONLY public.caisses DROP CONSTRAINT caisse_utilisateurs_id_fkey;
       public          postgres    false    235    217    3267            �           2606    25724 4   factures_articles factures_articles_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.factures_articles
    ADD CONSTRAINT factures_articles_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 ^   ALTER TABLE ONLY public.factures_articles DROP CONSTRAINT factures_articles_articles_id_fkey;
       public          postgres    false    3247    227    215            �           2606    25729 4   factures_articles factures_articles_factures_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.factures_articles
    ADD CONSTRAINT factures_articles_factures_id_fkey FOREIGN KEY (factures_id) REFERENCES public.factures(id) NOT VALID;
 ^   ALTER TABLE ONLY public.factures_articles DROP CONSTRAINT factures_articles_factures_id_fkey;
       public          postgres    false    225    227    3257            �           2606    25719 &   factures factures_utilisateurs_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.factures
    ADD CONSTRAINT factures_utilisateurs_id_fkey FOREIGN KEY (utilisateurs_id) REFERENCES public.utilisateurs(id) NOT VALID;
 P   ALTER TABLE ONLY public.factures DROP CONSTRAINT factures_utilisateurs_id_fkey;
       public          postgres    false    3267    225    235            �           2606    25739 :   inventaires_articles inventaires_articles_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.inventaires_articles
    ADD CONSTRAINT inventaires_articles_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 d   ALTER TABLE ONLY public.inventaires_articles DROP CONSTRAINT inventaires_articles_articles_id_fkey;
       public          postgres    false    215    3247    231            �           2606    25744 =   inventaires_articles inventaires_articles_inventaires_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.inventaires_articles
    ADD CONSTRAINT inventaires_articles_inventaires_id_fkey FOREIGN KEY (inventaires_id) REFERENCES public.inventaires(id) NOT VALID;
 g   ALTER TABLE ONLY public.inventaires_articles DROP CONSTRAINT inventaires_articles_inventaires_id_fkey;
       public          postgres    false    231    3261    229            �           2606    25734 ,   inventaires inventaires_utilisateurs_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.inventaires
    ADD CONSTRAINT inventaires_utilisateurs_id_fkey FOREIGN KEY (utilisateurs_id) REFERENCES public.utilisateurs(id) NOT VALID;
 V   ALTER TABLE ONLY public.inventaires DROP CONSTRAINT inventaires_utilisateurs_id_fkey;
       public          postgres    false    229    235    3267            �           2606    25749    stocks stocks_articles_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.stocks
    ADD CONSTRAINT stocks_articles_id_fkey FOREIGN KEY (articles_id) REFERENCES public.articles(id) NOT VALID;
 H   ALTER TABLE ONLY public.stocks DROP CONSTRAINT stocks_articles_id_fkey;
       public          postgres    false    215    3247    233            y   2   x�3�t�70�52026�02�1t,t�L�����DǜLN#�=... �	�      {      x�3�4�4a ������ "�      c     x�mU�n�F]��
��J�y�����ƈ���Ici�ÒC���/����?�3��Fh -$���8�+N_�&�v��c���>M��!�m�J�N
����c8�i	˚d��`�>vch7� ��ѷ�����%��J[���w;߄�$*����q�d��ا!_t5�TmM�]��[��e+�H8+��NM�p�I�����M��p��2�d]sV��ԅ��S�&����8����(�x������U�cw�K��Q8�٥�;o�z_}������qI�a~i���|�z�i�S�>�4T��1��w������I�L��S�ve�b�I�R�D0�C���_��2|��N0n����>���O�Hɸ�FO�{�MC�l,�ӌ�t359>������i����ǽ/���k��k�*.�&���U�0�5"���	M�2F0!�6A&�!2�)��V�_�aYE\I�^��DJ.�q&�N߿��瑊R��q��1L��|LhF�����>����"�!{ȝ4����L@�$�'Җ�֜K&+�//��Q�K��b���|l�cH]��2�Wڑ���OH��Z��2�����h��rZu���j��XT��x<nS�]��(������.&r�SkǠ��ݶ(&���)�򁴀���~k�!�E�$}�&8Tr���r\B�B���=X����TK�j��LU��O�/6d@_���'�N��a�߂�0�b��xV1�|uF5x%�cJч�M�^W�Sd�p~�����T%�m��90Nc�Pţ��`��i�=���Z�%����&��1���u�m�q�f�ӗ�+��1�M0.A�� �.�\����r�
�@���Y�@3[Y<1t��q~�E��q�xɷ�e��q��\�4�>����R	��*���
�"�ja-3��r���,0[�@����Ol���Z�tA���C�m=��܋�|����m�_�2��0��Z��i�	�
�����o��2��&N�_c����E      e   J   x�3�4202�5��52�4�062�K�+IU�;����9��P���(m�e�Pm�ilffb������:F��� D�      g     x�eTKn�0]O�]V-��>�$E�14AV��ӕH�"��E��5t�)[�-�k��p�GF�:�3����A��6�myO��UH ��$��-�}o5?�E��W� ��r��*��J\6+�ȡ[	7b��D!��4��(�+�1�[�W�bxfU���	I�d�����ѻz
OZ�V_��̚q Q�JHkX�a�D9�ػM��8�
xbzc[�Q~��X���$�z��8��#x��B����j�f<�$�?J���q�	<,�)<)�ׯOb�PnN��^Y��p���M��0��)⩬�8���c�8ԶbFl�&��K��H����d�[�(a��9*���O���2�p�U�<��3�1�WF+)ޭC3��:�Q^,�*�g�p��qЬ��@��Z(��W��N������y^���F�3�ɐ�xw� |k;-Z�Nc<Ee��K��Ҝ�	���s�x/�d�c4�p����Ȧ��_�.�7\Z��?gO��u�%4D�'&�Pt5k�i,O��ImNhr��︬K4�m+�?�����Q�&�q��F���5�3���n�N`5�����'����s�VB�x�Cx\��+$�d�^���%�P�f�-K��9Kx��Q&G@��sd��)2
7L�y���2x��I�;�|w��TL�ܹǹ1+��C�w;+�E+c��(�<���ʵ�.��^G�kA���{���=aж�(�D*TC�7���q!�7x�sOK�_�4���߾����"�{�":}�N��J��gB��'      i      x�3�46�46���"�=...  �'      k   :   x�3�tL�H,QHN,J*-J�+�4202�5��52�44 .#t%1H��9�LA�b���� 9�v      m   8   x�3�tst10�52026�02�1t,t���Ĝ����R�����DN#�=... 8t[      o      x�32�4�4Ac#c�=... ��      q   '   x�3���10�52026�02�1t,tAL�=... ���      s   \  x�-�[�� D���\�ϐ�����zj��H-����/\>����=�)cJ���R�3������;�;e�ZS.F��)?Fe	�%#l���@#1]F��̔j���!��N#و6��m���n��|�|�-G�>9 �K�w R��#� 2� ��v��� o _�� ��@<��b^�@��fw=N/A �y� �A��A���� nA�3H �tH QJ 	`j�3�}����$�ZI~��L��GI|�CN��;�"�v\�/��n�� T��) ��BԾzu� ��k Ի7P j�#, ��j  �@�Y� ��6��� ��4�4�W�$�ny      u   ]  x�-R�1��T�+�����(䫄N'��@�H�B-
Yh6q�Nssc�U�Ao^\�>��i�X��"`\���O�Ќ��bZ}9�>�v�fl�b��}�4��T��f.*$3`\�R�(m8̟+5�Yh1jt~˵��a$F�i���Z�7}0BF�q��KB�4K�i=�R���R{[I����@ف�T�^��8K�=��X:t�Q�{H�� �^��8h��o�������K�_̰��`9�~WiS*+����YJ��w9A��8ژ�z#!�4�%|8z;��Cs��~�Es`���B�)M~��� (���Ϭ�z��wA�q7�_�{ J�������j       w   �   x�3�t�K�������I�S�M,/���U��42�04�4���LO-�LL����T1�T14P�p-+MJKI�-���2KKJt1�3(���1��w�7�pJ��-��ˎ,(��(�
2(�t�Y\R�X�ZZ����� �U(3     