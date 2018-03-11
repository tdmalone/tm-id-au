#!/usr/bin/env bash

# Custom deployment script for tm.id.au WordPress theme.
#
# @author Tim Malone <tdmalone@gmail.com>

# TODO: Get remote server ready - ie start an EC2 server; add current IP to the firewall etc.
# TODO: Deploy theme.

# Remotely call the custom endpoint that causes static site re-generation.
# Server will then sync to S3 via lsync.
curl -X POST "${TM_WP_URL}/wp-json/tm/v1/ss/generate?token=${TM_WP_REST_API_TOKEN}"

# TODO: Wait for on-server routines to complete, then remove IP from firewall; stop EC2 server etc.
