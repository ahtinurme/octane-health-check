# Changelog

All notable changes to `octane-health-check` will be documented in this file.

## unreleased

- fix `Class "Swoole\Process" not found` when using `frankenphp`
- add `ApplicationServerEnum` to improve checks and messages
- refactor `isApplicationServerRunning`
- allow `setServer` method to receive a string or an `ApplicationServerEnum` instance 
- show in messages/errors which application server is being used

## v2.0 - 2025-06-08

Laravel 12 support (thanks https://github.com/devSviat)

## v1.1.0 - 2024-03-22

Add Laravel 11 support
**Full Changelog**: https://github.com/ahtinurme/octane-health-check/compare/1.0.0...1.1.0

## v1.0.0 - 2023-10-29

Initial release

## 1.0.0 - 2023-10-29

- initial release
