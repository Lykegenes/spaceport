<?php

namespace Spaceport\ColumnTypes;

interface ColumnTypesConstants
{
    // 0-100 : IDs and Hashes
    const COL_ID = 1;

    // 100-200 : Common System columns
    const COL_TITLE = 100;
    const COL_CREATED_AT = 110;
    const COL_UPDATED_AT = 111;
    const COL_DELETED_AT = 112;
    const COL_CREATED_BY = 120;
    const COL_UPDATED_BY = 121;
    const COL_DELETED_BY = 122;

    // 300-399 : Test-based columns
    const COL_TEXT_FIELD = 300;
    const COL_TEXT_AREA = 301;
    const COL_TEXT_RICH = 310;
    const COL_LINK = 320;

    // 400-499 : Number-based columns
    const COL_BOOLEAN = 400;
    const COL_INTEGER = 401;
    const COL_DECIMAL = 402;
    const COL_CURRENCY = 403;

    // 500-599 : User-based columns
    const COL_USER = 500;
    const COL_GROUP = 501;
    const COL_USER_AND_GROUP = 502;
    const COL_USER_MULTIPLE = 510;
    const COL_GROUP_MULTIPLE = 511;
    const COL_USER_AND_GROUP_MULTIPLE = 512;

    // 600-699 : Date-based columns
    const COL_DATE = 600;
    const COL_DATETIME = 601;
    const COL_DATETIME_TZ = 602;

    // 700-799 : Dropdown-based columns
    const COL_CHOICES = 700;
    const COL_CHOICES_CUSTOM = 701;
    const COL_CHOICES_MULTIPLE = 702;
    const COL_CHOICES_CUSTOM_MULTIPLE = 703;
    const COL_LOOKUP = 710;
    const COL_LOOKUP_MULTIPLE = 711;

    // 800-899 : File-based columns
    const COL_FILE = 800;
    const COL_FILE_MULTIPLE = 801;
    const COL_IMAGE = 802;
    const COL_IMAGE_MULTIPLE = 803;

    // 900-999 : Special columns
    const COL_CALCULATED = 900;
}
